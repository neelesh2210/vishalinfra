<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Pincode;
use Illuminate\Support\Facades\Hash;
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

        if (Auth::guard('web')->attempt(['user_name' => $user->user_name,'password' => $request->password,])){
            return redirect()->route('user.dashboard');
        }

        //return redirect()->route('signin');

    }

    public function getAddress(Request $request){
        return Pincode::where('pincode',$request->pincode)->with(['country','state','city'])->first();
    }
}
