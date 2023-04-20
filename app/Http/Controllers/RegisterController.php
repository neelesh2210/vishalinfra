<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\Admin\Pincode;
use Craftsys\Msg91\Facade\Msg91;
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
        if(Session::get('otp') != $request->otp){
            return response()->json(['otp'=>'Wrong Otp!'],422);
        }else{
            $user = new User;
            $user->type = $request->type;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->referrer_code = strtoupper(generateRandomString(6));
            $user->referral_code = $request->referral_code;
            $user->password = Hash::make($request->password);
            $user->save();

            $user_profile = new UserProfile;
            $user_profile->user_id = $user->id;
            $user_profile->aadhar_number = $request->aadhar_number;
            $user_profile->level = $request->level ?? 0;
            $user_profile->save();

            $user_address = new UserAddress;
            $user_address->user_id = $user->id;
            $user_address->country = $request->country;
            $user_address->state = $request->state;
            $user_address->city = $request->city;
            $user_address->pincode = $request->pincode;
            $user_address->landmark = $request->landmark;
            $user_address->save();
            Session::forget('otp');
            if($request->added_by != 'associate'){
                Auth::login($user);
            }
            return 1;
        }

    }

    public function getAddress(Request $request){
        return Pincode::where('pincode',$request->pincode)->with(['country','state','city'])->first();
    }

    public function sendOtp(Request $request){
        $this->validate($request, [
            'phone' => 'required|min:10|max:10|unique:users,phone',
        ]);
        if(env('APP_ENV') == 'local'){
            $otp=1234;
        }else{
            $otp=rand(1111,9999);
        }
        Msg91::sms()->to('91'.$request->phone)->flow('61fbb9f27ca7fa28af01f169')->variable('user', $request->name)->variable('business_name', 'Vishalinfra')->variable('otp', $otp)->send();
        Session::put('otp',$otp);
        return 1;
    }

    public function associateRegister(Request $request){
        $referral_code = $request->referral_code;
        if($referral_code){
            $user = User::where('referrer_code',$referral_code)->first();
            if(optional($user)->type == 'associate'){
                return view('frontend.auth.associate_register',compact('referral_code'));
            }else{
                return redirect()->route('register');
            }
        }else{
            return redirect()->route('register');
        }
    }
}
