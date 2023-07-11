<?php

namespace App\Http\Controllers\Frontend\Auth;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Pincode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{

    public function register(){
        if(Auth::guard('web')->user()){
            return redirect()->route('user.dashboard');
        }else{
            return view('frontend.auth.register');
        }
    }

    public function registration(RegisterRequest $request){
        $user = new User;
        $user->user_name = explode(' ',$request->name)[0].generateRandomString(4);
        $user->type = $request->type;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->save();

        Mail::send('frontend.email.welcome', ['user_name'=>$user->name,'phone'=>$user->phone], function($message) use($user){
            $message->to($user->email);
            $message->subject('Registration Successful');
        });

        if (Auth::guard('web')->attempt(['user_name' => $user->user_name,'password' => $request->password,])){
            return redirect()->route('user.dashboard');
        }
    }

    public function getAddress(Request $request){
        return Pincode::where('pincode',$request->pincode)->with(['country','state','city'])->first();
    }
}
