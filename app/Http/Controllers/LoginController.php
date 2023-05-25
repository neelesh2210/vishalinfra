<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest:web', ['except' => ['logout']]);
    }

    public function signin(){
        if(Auth::guard('web')->user()){
            return redirect()->route('user.dashboard');
        }else{
            $previous_url = URL::previous();
            return view('frontend.auth.login',compact('previous_url'));
        }
    }

    public function login(Request $request){
        $this->validate($request, [
            'user_name' => 'required|exists:users,user_name',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('web')->attempt(['user_name' => $request->user_name,'password' => $request->password,])){
            return redirect()->route('user.dashboard');
        }
        return back()->with('error','*Credential does not Matched!');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('signin');
    }

}
