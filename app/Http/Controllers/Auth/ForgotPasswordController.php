<?php

namespace App\Http\Controllers\Auth;

use Session;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Craftsys\Msg91\Facade\Msg91;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{

    public function sendMailForgotPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        try {
            Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password');
            });
        } catch (\Throwable $th) {
            //throw $th;
        }

        return back()->with('success','We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token) {
        return view('forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')->where(['email' => $request->email,'token' => $request->token])->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect()->route('signin')->with('success', 'Your password has been changed!');
    }

    public function sendOtpForgetPassword(Request $request){
        Session::forget('forget_password_otp');
        Session::forget('forget_password_phone');
        $request->validate([
            'phone' => 'required|exists:users,phone',
        ]);
        $user = User::where('phone',$request->phone)->first();
        $otp = rand(111111,999999);
        try {
            Msg91::sms()->to('91'.$request->phone)->flow('659653fcd6fc0543530e1f55')->variable('name',$user->name)->variable('otp',$otp)->send();
        } catch (\Throwable $th) {
            //throw $th;
        }
        Session::put('forget_password_otp',$otp);
        Session::put('forget_password_phone',$request->phone);

        return redirect()->route('verify.otp.forget.password');
    }

    public function verifyOtpForgetPassword(){
        if(Session::get('forget_password_otp') && Session::get('forget_password_phone') ){
            return view('frontend.auth.verify_forget_otp');
        }
        return redirect()->route('forgot.password');
    }

    public function validateOtpForgetPassword(Request $request){
        if(Session::get('forget_password_otp') == $request->otp){
            return redirect()->route('set.new.password');
        }
        return back()->withErrors(['otp'=>'Invalid OTP!']);
    }

    public function setNewPassword(){
        if(Session::get('forget_password_otp') && Session::get('forget_password_phone') ){
            return view('frontend.auth.set_new_password');
        }
        return redirect()->route('forgot.password');
    }

    public function updateNewPassword(Request $request){
        if($request->password === $request->confirm_password){
            $user = User::where('phone',Session::get('forget_password_phone'))->first();
            if($user){
                $user->password = Hash::make($request->password);
                $user->save();

                return redirect()->route('signin')->with('success','Password Reset Successfully!');
            }else{
                return back()->withErrors(['password'=>'Invalid User!']);
            }
        }else{
            return back()->withErrors(['password'=>'Password Not Matched']);
        }
    }

}
