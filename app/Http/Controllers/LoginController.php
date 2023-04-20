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

    public function showLogin(){
        if(Auth::guard('web')->user()){
            return redirect()->route('user.dashboard');
        }else{
            $previous_url = URL::previous();
            return view('frontend.auth.login',compact('previous_url'));
        }
    }

    public function login(Request $request){
        $this->validate($request, [
            'phone' => 'required|exists:users,phone',
            'password' => 'required|min:8'
        ]);

        // if (Auth::guard('web')->attempt([
        //     'phone' => $request->phone,
        //     'password' => $request->password,
        //     'status' => function ($query) {
        //         $query->where('is_verified', '1');
        //     }
        //     ])){
        //     return redirect()->route('user.dashboard');
        // }
        if (Auth::guard('web')->attempt([
            'phone' => $request->phone,
            'password' => $request->password,
            ])){

            if($request->previous_url){
                return redirect()->to($request->previous_url);
            }else{
                return redirect()->route('user.dashboard');
            }
        }
        return back()->with('error','*Credential does not Matched!');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

}
