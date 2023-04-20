<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\AssociateWallet;

class AssociateWalletController extends Controller
{

    public function index(Request $request,$assocaite_id){
        $user = User::where('id',$assocaite_id)->first();
        if($user->type == 'associate'){
            $search_date = $request->search_date;
            $search_key = $request->search_key;

            $transactions = AssociateWallet::where('user_id',$assocaite_id);

            if($search_date){
                $dates=explode('-',$search_date);
                $d1=strtotime($dates[0]);
                $d2=strtotime($dates[1]);
                $da1=date('Y-m-d',$d1);
                $da2=date('Y-m-d',$d2);
                $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
                $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

                $search_date=$dates[0].'-'.$dates[1];
                $transactions = $transactions->whereBetween('created_at', [$startDate, $endDate]);
            }
            if($search_key){
                $transactions = $transactions->where('remark','like','%'.$search_key.'%');
            }

            $transactions = $transactions->orderBy('created_at','desc')->paginate(15);

            return view('admin.user.associate.wallet.index',compact('transactions','assocaite_id','user','search_date','search_key'),['page_title'=>'Associate Wallet Transactions']);
        }else{
            return back()->with('error','Only Associate Have Wallet');
        }
    }

    public function store(Request $request){
        AssociateWallet::create([
            'user_id'=>$request->user_id,
            'amount'=>$request->amount,
            'transaction_type'=>'credit',
            'remark'=>$request->remark,
        ]);

        return back()->with('success','Amount Added To Wallet!');
    }

}
