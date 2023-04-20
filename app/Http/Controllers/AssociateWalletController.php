<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Admin\AssociateWallet;

class AssociateWalletController extends Controller
{

    public function index(){
        $transactions = AssociateWallet::where('user_id',Auth::guard('web')->user()->id)->paginate(15);

        return view('frontend.user_dashboard.associate.wallet.index',compact('transactions'));
    }

}
