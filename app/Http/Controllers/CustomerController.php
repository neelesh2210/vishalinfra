<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index(){
        $associates = User::where('referral_code',Auth::guard('web')->user()->referrer_code)->where('type',request()->user_type)->orderBy('created_at','desc')->paginate(15);
        return view('frontend.user_dashboard.associate.index',compact('associates'),['user_type'=>request()->user_type]);
    }

    public function create(){
        return view('frontend.user_dashboard.associate.create');
    }

    public function store(Request $request){
        //
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
