<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
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

        return redirect()->route('signin');

    }
}
