<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function profile(){
        $profile = Auth::guard('web')->user();
        return view('frontend.user_dashboard.profile',compact('profile'));
    }

    public function saveProfile(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:150',
        ]);
        if($request->email){
            $this->validate($request, [
                'email' => 'email|unique:users,email,'. Auth::guard('web')->user()->id .'id'
            ]);
        }
        $user = User::find(Auth::guard('web')->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $user_address = UserAddress::updateOrCreate([
            'user_id'=>Auth::guard('web')->user()->id
        ],[
            'country'=>$request->country,
            'state'=>$request->state,
            'city'=>$request->city,
            'pincode'=>$request->pincode,
            'landmark'=>$request->landmark,

        ]);

        $user_profile = UserProfile::where('user_id',Auth::guard('web')->user()->id)->first();
        if(!$user_profile){
            $user_profile = new UserProfile;
            $user_profile->user_id = Auth::guard('web')->user()->id;
        }
        if($request->has('avatar')){
            $user_profile->avatar = imageUpload($request->file('avatar'),'frontend/images/user/avatars');
        }
        $user_profile->save();

        return back()->with('success','Profile Updated Successfilly!');

    }

    public function kyc(){
        return view('frontend.user_dashboard.kyc');
    }

    public function saveKyc(Request $request){
        $user_profile = UserProfile::where('user_id',Auth::guard('web')->user()->id)->first();
        if(!$user_profile){
            $user_profile = new UserProfile;
            $user_profile->user_id = Auth::guard('web')->user()->id;
        }
        if($request->has('adhar_front')){
            $user_profile->adhar_front = imageUpload($request->file('adhar_front'),'frontend/images/user/documents');
        }
        if($request->has('adhar_back')){
            $user_profile->adhar_back = imageUpload($request->file('adhar_back'),'frontend/images/user/documents');
        }
        if($request->has('pan_front')){
            $user_profile->pan_front = imageUpload($request->file('pan_front'),'frontend/images/user/documents');
        }
        if($request->has('pan_back')) {
            $user_profile->pan_back = imageUpload($request->file('pan_back'),'frontend/images/user/documents');
        }
        if($request->has('passbook_cheque')) {
            $user_profile->passbook_cheque = imageUpload($request->file('passbook_cheque'),'frontend/images/user/documents');
        }
        $user_profile->save();

        return back()->with('success','Document Updated Successfully!');
    }
}
