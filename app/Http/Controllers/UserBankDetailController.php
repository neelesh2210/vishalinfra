<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\UserBankDetail;

class UserBankDetailController extends Controller
{

    public function saveBankDetail(Request $request){
        UserBankDetail::updateOrCreate([
            'user_id'=>Auth::guard('web')->user()->id
        ],[
            'holder_name'=>$request->holder_name,
            'account_number'=>$request->account_number,
            'ifsc_code'=>$request->ifsc_code,
            'bank_name'=>$request->bank_name,
            'branch_name'=>$request->branch_name,
            'upi_id'=>$request->upi_id,
        ]);

        return back()->with('success','Bank Detail updated Successfully!');
    }

}
