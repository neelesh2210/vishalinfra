<?php

namespace App\Http\Controllers\Frontend\Auth;

use Auth;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Pincode;
use Craftsys\Msg91\Facade\Msg91;
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

    public function sendOtp(RegisterRequest $request){
        $otp = rand(111111,999999);
        try {
            Msg91::sms()->to('91'.$request->phone)->flow('6565a7dad6fc056d141c67b3')->variable('user',$request->name)->variable('otp',$otp)->send();
        } catch (\Throwable $th) {
            //throw $th;
        }
        Session::put('registration_detail',$request->all());
        Session::put('registration_otp',$otp);

        return redirect()->route('verify.otp');
    }

    public function verifyOtp(){
        return view('frontend.auth.verify_otp');
    }

    public function registration(Request $request){
        if($request->otp == Session::get('registration_otp')){
            $data = Session::get('registration_detail');
            $user = new User;
            $user->user_name = explode(' ',$data['name'])[0].generateRandomString(4);
            $user->type = $data['type'];
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->password = Hash::make($data['password']);
            $user->save();

            try{
                Mail::send('frontend.email.welcome', ['user_name'=>$user->name,'phone'=>$user->phone], function($message) use($user){
                    $message->to($user->email);
                    $message->subject('Registration Successful');
                });
            }catch(\Throwable $th){
                //throw $th;
            }

            if (Auth::guard('web')->attempt(['user_name' => $user->user_name,'password' => $data['password'],])){
                return redirect()->route('user.dashboard');
            }

        }else{
            return back()->withErrors(['otp'=>'Wrong OTP']);
        }
    }

    public function getAddress(Request $request){
        return Pincode::where('pincode',$request->pincode)->with(['country','state','city'])->first();
    }
}
