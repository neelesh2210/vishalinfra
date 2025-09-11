<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Installment;
use App\Models\Admin\Charge;
use App\Models\BookProperty;
use Illuminate\Http\Request;
use App\Models\Admin\Property;
use App\Models\Admin\Commission;
use App\Models\Admin\LevelPercent;
use App\Models\InstallmentRequest;
use App\Http\Controllers\Controller;

class InstallmentRequestController extends Controller
{

    public function list(){
        $installment_requests = InstallmentRequest::with('property','bookProperty','bookedBy')->latest()->paginate(10);

        return view('admin.installment_request.list',compact('installment_requests'),['page_title'=>'Installment Request List']);
    }

    public function status(Request $request){
        $installment_request = InstallmentRequest::find($request->id);
        if($installment_request){
            if($installment_request->status == 'pending'){
                if($request->status == "Confirm"){
                    $property = Property::where('is_delete','0')->where('is_status','1')->where('property_number',$installment_request->property_number)->first();
                    if($property){
                        $book_property = BookProperty::where('property_id',$property->id)->whereIn('booking_status',['on_hold','reserved','booked','registred'])->latest('id')->first();
                        $total_installment_amount = Installment::where('booking_id',$book_property?->id)->sum('final_amount');
                        $total_paying_amount = $total_installment_amount + $installment_request->amount;

                        if($total_paying_amount <= $property->final_price){
                            $associate = User::where('id',$installment_request->installment_by)->first();

                            $booking_status = 'on_hold';

                            if($total_paying_amount >= $property->token_money){
                                $booking_status = 'reserved';
                            }
                            if($total_paying_amount >= $property->booking_amount){
                                $booking_status = 'booked';
                            }
                            if($total_paying_amount >= $property->registry_amount){
                                $booking_status = 'registred';
                            }
                            if($total_paying_amount == $property->final_price){
                                $booking_status = 'sold';
                            }

                            if(!$book_property){
                                $book_property = new BookProperty;
                                $book_property->book_property_id = mt_rand(111111,999999);
                                $book_property->property_id = $property->id;
                                $book_property->customer_name = $installment_request->customer_name;
                                $book_property->customer_email = $installment_request->customer_email;
                                $book_property->customer_phone = $installment_request->customer_phone;
                                if($associate){
                                    $book_property->booked_by = $associate->id;
                                    $book_property->booked_type = $associate->type;
                                }else{
                                    $book_property->booked_by = null;
                                    $book_property->booked_type = 'admin';
                                }
                            }
                            $book_property->booking_status = $booking_status;
                            $book_property->save();

                            $installment = new Installment;
                            $installment->booking_id = $book_property->id;
                            $installment->amount = $installment_request->amount;
                            $installment->final_amount = $installment_request->amount;
                            $installment->taken_by = $installment_request->installment_by;
                            $installment->taken_by_type = 'associate';
                            $installment->payment_detail = $installment_request->payment_type;
                            $installment->save();

                            Property::where('id',$property->id)->update([
                                'booking_status'=>$booking_status
                            ]);

                            $min_commission_amount_setting = Charge::where('type','min_commission_amount')->first();
                            if($min_commission_amount_setting){
                                if($min_commission_amount_setting->amount_type == 'percent'){
                                    $min_commission_amount = ($property->final_price/100)*$min_commission_amount_setting->amount;
                                }else{
                                    $min_commission_amount = $min_commission_amount_setting->amount;
                                }

                                $commission_show = '0';
                                if($total_paying_amount >= $min_commission_amount){
                                    $commission_show = '1';
                                }

                                $this->commissionDistribution(
                                                                $installment_request->installment_by,     //Associate ID
                                                                $property->id,                      //Property ID
                                                                $installment_request->amount,                   //Paid Amount
                                                                $installment->id,                   //Installment ID
                                                                $commission_show                    //Commission Confirmation
                                                            );
                            }

                            $installment_request->booking_id = $book_property->id;
                            $installment_request->status = 'success';
                            $installment_request->save();

                            return response()->json(['message'=>'Property Installment Request Confirm Successfully!']);
                        }else{
                            return response()->json(['message'=>'You can not pay more then final Price!'],422);
                        }
                    }else{
                        return response()->json(['message'=>'Property Not Available!'],422);
                    }
                }else{
                    $installment_request->status = 'cancel';
                    $installment_request->save();

                    return response()->json(['message'=>'Installment Request Cancelled!'],422);
                }
            }else{
                return response()->json(['message'=>'Installment Request Already Proccessed'],422);
            }
        }else{
            return response()->json(['message'=>'Installment Request not Found!'],422);
        }
    }

    public function commissionDistribution($associate_id,$property_id,$amount,$installment,$commission_show){
        $property = Property::where('is_delete','0')->where('is_status','1')->where('id',$property_id)->first();

        $ration_percent = ($property->commission_amount / $property->final_price) * 100;

        $ration_percent = round($ration_percent,2);

        $token_amount_percent = ($amount / 100) * $ration_percent;

        $user = User::where('id',$associate_id)->with(['userProfile'])->first();

        $level = LevelPercent::where('level',$user->userProfile->level ?? 0)->first();

        $commission_amount = ($token_amount_percent / 100) * $level->percent;

        $installment_detail = Installment::where('id',$installment)->first();
        $all_installment_ids = Installment::where('booking_id',$installment_detail->booking_id)->pluck('id')->toArray();

        // $total_sales_amount = BookProperty::where('booked_by',$user->id)->sum('final_amount');

        $commission = new Commission;
        $commission->installment_id = $installment;
        $commission->user_id = $user->id;
        $commission->property_id = $property->id;
        $commission->commission_amount = $commission_amount;
        $commission->level = $level->level;
        $commission->percentage = $level->percent;
        $commission->commission_type = 'active';
        $commission->is_confirm = $commission_show;
        $commission->save();

        if($commission_show == '1'){
            Commission::whereIn('installment_id',$all_installment_ids)->where('is_confirm','0')->update(['is_confirm'=>'1']);
        }

        // $upgrade_amount = 0;
        // $levels = LevelPercent::all();
        // foreach ($levels as $leve) {
        //     $upgrade_amount = $upgrade_amount + $leve->amount;
        //     if($level->level+1 == $leve->level){
        //         break;
        //     }
        // }

        // if($total_sales_amount >= $upgrade_amount){
        //     UserProfile::where('user_id',$user->id)->update([
        //         'level'=>$level->level+1
        //     ]);

        //     LevelUpgradeRecord::create([
        //         'user_id'=>$user->id,
        //         'to'=>$level->level,
        //         'from'=>$level->level+1,
        //         'type'=>'auto',
        //     ]);
        // }

        if($user->sponsor_code){
            $times = 'multiple';

            $final_commission_amount = $token_amount_percent;
            $this->associateCommissionDistribution  ($user->sponsor_code,                  //User Referral Code
                                                        $user?->userProfile?->level ?? 0,          //User Level
                                                        $commission_amount,                 //Commission Amount
                                                        $property->id,                      //Property Id
                                                        $final_commission_amount,           //Final Commission Amount
                                                        $times,                             //Times
                                                        $installment,                       //installment
                                                        $commission_show
                                                    );
        }
    }

    public function associateCommissionDistribution($user_referral_code,                    //User Referral Code
                                                        $user_level,                        //User Level
                                                        $commission_amount,                 //Commission Amount
                                                        $property_id,                       //Property Id
                                                        $final_commission_amount,           //Final Commission Amount
                                                        $times,                             //Times
                                                        $installment,                       //installment
                                                        $commission_show
                                                    ){
        $associate = User::where('user_name',$user_referral_code)->with(['userProfile'])->first();
        if($associate->type == 'agent'){
            if($user_level >= $associate?->userProfile?->level ?? 0){
                $commission_amount = ($commission_amount / 100) * 10;

                $commission = new Commission;
                $commission->installment_id = $installment;
                $commission->user_id = $associate->id;
                $commission->property_id = $property_id;
                $commission->commission_amount = $commission_amount;
                $commission->level = $associate?->userProfile?->level ?? 0;
                $commission->percentage = 10;
                $commission->commission_type = 'passive';
                $commission->is_confirm = $commission_show;
                $commission->save();

                // $upgrade_amount = 0;
                // $levels = LevelPercent::all();
                // foreach ($levels as $leve) {
                //     $upgrade_amount = $upgrade_amount + $leve->amount;
                //     if($associate->userProfile->level+1 == $leve->level){
                //         break;
                //     }
                // }

                // if($associate->total_sales >= $upgrade_amount){
                //     UserProfile::where('user_id',$associate->id)->update([
                //         'level'=>$associate->userProfile->level+1
                //     ]);

                //     LevelUpgradeRecord::create([
                //         'user_id'=>$associate->id,
                //         'to'=>$associate->userProfile->level,
                //         'from'=>$associate->userProfile->level+1,
                //         'type'=>'auto',
                //     ]);
                // }

                if($times == 'multiple'){
                    if($associate->sponsor_code){
                        $final_commission_amount = $final_commission_amount;
                        $this->associateCommissionDistribution($associate->sponsor_code,                //Associate Level
                                                                    $associate?->userProfile?->level ?? 0,      //Referral Code
                                                                    $commission_amount,                  //Commission Amount
                                                                    $property_id,                        //Commission Amount
                                                                    $final_commission_amount,            //Final Commission Amount
                                                                    $times,                              //Times
                                                                    $installment,                        //installment
                                                                    $commission_show
                                                                );
                    }
                }else{
                    return ;
                }
            }else{
                $percent_associate = LevelPercent::where('level',$associate?->userProfile?->level ?? 0)->first();
                $percent_user = LevelPercent::where('level',$user_level)->first();
                $percent = $percent_associate->percent - $percent_user->percent;
                $commission_amount = ($final_commission_amount / 100) * $percent;

                Commission::create([
                    'installment_id'=>$installment,
                    'user_id'=>$associate->id,
                    'property_id'=>$property_id,
                    'commission_amount'=>$commission_amount,
                    'level'=>$percent_associate->level,
                    'percentage'=>$percent_associate->percent,
                    'commission_type'=>'passive',
                    'is_confirm'=>$commission_show,
                ]);

                // $upgrade_amount = 0;
                // $levels = LevelPercent::all();
                // foreach ($levels as $leve) {
                //     $upgrade_amount = $upgrade_amount + $leve->amount;
                //     if($percent_associate->level+1 == $leve->level){
                //         break;
                //     }
                // }

                // if($associate->total_sales >= $upgrade_amount){
                //     UserProfile::where('user_id',$associate->id)->update([
                //         'level'=>$percent_associate->level+1
                //     ]);

                //     LevelUpgradeRecord::create([
                //         'user_id'=>$associate->id,
                //         'to'=>$percent_associate->level,
                //         'from'=>$percent_associate->level+1,
                //         'type'=>'auto',
                //     ]);
                // }

                if($times == 'multiple'){
                    if($associate->sponsor_code){
                        $final_commission_amount = $final_commission_amount;
                        $this->associateCommissionDistribution($associate->sponsor_code,                //Associate Level
                                                                    $associate?->userProfile?->level ?? 0,      //Referral Code
                                                                    $commission_amount,                  //Commission Amount
                                                                    $property_id,                        //Commission Amount
                                                                    $final_commission_amount,            //Final Commission Amount
                                                                    $times,                              //Times
                                                                    $installment,                        //installment
                                                                    $commission_show
                                                                );
                    }
                }else{
                    return ;
                }
            }
        }
    }

}
