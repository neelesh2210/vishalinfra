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
        return view('frontend.user.profile',compact('profile'));
    }

    public function saveProfile(Request $request){

        $this->validate($request, [
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|unique:users,email,'. Auth::guard('web')->user()->id .'id',
            'phone' => 'required|min:10|max:10|unique:users,phone,'. Auth::guard('web')->user()->id .'id'
        ]);

        $user = User::find(Auth::guard('web')->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
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

}
