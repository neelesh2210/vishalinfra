<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\CPU\PropertyManager;
use App\Models\BookProperty;
use Illuminate\Http\Request;
use App\Models\Admin\Property;
use App\Models\Admin\Commission;
use App\Models\Admin\LevelPercent;
use App\Models\Admin\AssociateWallet;

class BookPropertyController extends Controller
{

    public $highest_level = '';
    public $highest_level_commission = '';

    public function propertyBook(Request $request){

        $associate_wallet_credit = AssociateWallet::where('user_id',Auth::guard('web')->user()->id)->where('transaction_type','credit')->get();
        $associate_wallet_debit = AssociateWallet::where('user_id',Auth::guard('web')->user()->id)->where('transaction_type','debit')->get();
        $associate_wallet_amount = $associate_wallet_credit->sum('amount') - $associate_wallet_debit->sum('amount');

        if($associate_wallet_amount >= $request->token_amount){
            $property = PropertyManager::withoutTrash()->where('property_number',$request->property_number)->first();
            $book_property = new BookProperty;
            $book_property->property_id = $property->id;
            $book_property->token_amount = $property->token_money;
            $book_property->user_id = $request->user_id;
            $book_property->staff_id = Auth::guard('web')->user()->id;
            $book_property->payment_type = $request->pay_from;
            $book_property->save();

            Property::where('id',$property->id)->update([
                'booking_status'=>'reserved'
            ]);
            AssociateWallet::create([
                'user_id'=>Auth::guard('web')->user()->id,
                'amount'=>$property->token_money,
                'transaction_type'=>'debit'
            ]);

            $this->commissionDistribution(Auth::guard('web')->user()->id,$property->id,$property->token_money);

            return redirect()->route('user.property.index')->with('success','Property Book Successfully!');
        }else{
            return back()->with('error','You Have insufficient Balance in your Wallet!');
        }
    }

    public function commissionDistribution($associate_id,$property_id,$amount){
        $property = PropertyManager::withoutTrash()->where('id',$property_id)->first();

        $ration_percent = ($property->commission / $property->expected_price) * 100;

        $ration_percent = round($ration_percent,2);

        $token_amount_percent = ($amount / 100) * $ration_percent;

        $user = User::where('id',$associate_id)->with(['userProfile'])->first();

        $level = LevelPercent::where('level',$user->userProfile->level)->first();

        $commission_amount = ($token_amount_percent / 100) * $level->percent;

        AssociateWallet::create([
            'user_id'=>$user->id,
            'amount'=>$commission_amount,
            'transaction_type'=>'credit',
            'remark'=>'Commission'
        ]);

        Commission::create([
            'user_id'=>$user->id,
            'property_id'=>$property->id,
            'commission_amount'=>$commission_amount
        ]);

        if($user->referral_code){
            $this->highest_level = $user->userProfile->level;
            $this->highest_level_commission = $commission_amount;
            $final_commission_amount = $token_amount_percent - $commission_amount;
            $this->associateCommissionDistribution  ($user->userProfile->level,         //Associate Level
                                                        $user->referral_code,           //Referral Code
                                                        $commission_amount,             //Commission Amount
                                                        $final_commission_amount,       //Final Commission Amount
                                                        $property->id,                  //Property Id
                                                        $this->highest_level,           //Highest Level
                                                        $this->highest_level_commission  //Highest Level Commission
                                                    );
        }
    }

    public function associateCommissionDistribution($associate_level,               //Associate Level
                                                        $referral_code,             //Referral Code
                                                        $commission_amount,         //Commission Amount
                                                        $final_commission_amount,   //Final Commission Amount
                                                        $property_id,               //Property Id
                                                        $highest_level,             //Highest Level
                                                        $highest_level_commission   //Highest Level Commission
                                                    ){
        $user = User::where('referrer_code',$referral_code)->with(['userProfile'])->first();
        if($associate_level >= $user->userProfile->level){
            $commission_amount = ($commission_amount / 100) * 10;
            $highest_level = $highest_level;
            $highest_level_commission = $highest_level_commission;
        }else{
            $level = $user->userProfile->level - $associate_level;
            $percent = LevelPercent::where('level',$user->userProfile->level)->first();
            $commission_amount = ($final_commission_amount / 100) * $percent->percent;
            $highest_level = $user->userProfile->level;
            $highest_level_commission = $commission_amount;
        }

        AssociateWallet::create([
            'user_id'=>$user->id,
            'amount'=>$commission_amount,
            'transaction_type'=>'credit',
            'remark'=>'Commission'
        ]);

        Commission::create([
            'user_id'=>$user->id,
            'property_id'=>$property_id,
            'commission_amount'=>$commission_amount
        ]);

        if($user->referral_code){
            $final_commission_amount = $final_commission_amount - $commission_amount;
            $this->associateCommissionDistribution($user->userProfile->level,           //Associate Level
                                                        $user->referral_code,           //Referral Code
                                                        $commission_amount,             //Commission Amount
                                                        $final_commission_amount,       //Final Commission Amount
                                                        $property_id,                   //Property Id
                                                        $highest_level,                 //Highest Level
                                                        $highest_level_commission       //Highest Level Commission
                                                    );
        }
    }

}
