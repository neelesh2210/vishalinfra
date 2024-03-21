<?php

namespace App\Http\Controllers\Frontend\Auth;

use Auth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

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
            'password' => 'required|min:8'
        ]);

        $user = User::where('is_delete','0')->where('is_blocked','0')->where('is_verified','1')->where('user_name',$request->user_name)->first();
        if(!$user){
            $user = User::where('is_delete','0')->where('is_blocked','0')->where('is_verified','1')->where('email',$request->user_name)->first();
            if (Auth::guard('web')->attempt(['email' => $request->user_name,'password' => $request->password])){
                return redirect()->route('user.dashboard');
            }
        }
        if(!$user){
            $user = User::where('is_delete','0')->where('is_blocked','0')->where('is_verified','1')->where('phone',$request->user_name)->first();
            if (Auth::guard('web')->attempt(['phone' => $request->user_name,'password' => $request->password])){
                return redirect()->route('user.dashboard');
            }
        }

        if($user){
            if (Auth::guard('web')->attempt(['user_name' => $request->user_name,'password' => $request->password])){
                return redirect()->route('user.dashboard');
            }
        }
        return back()->with('error','*Credential does not Matched!');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('signin');
    }

}
