<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\CPU\UserManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request){
        $search_date = $request->search_date;
        $search_key = $request->search_key;

        $customers = User::orderBy('created_at','desc');
        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $customers = $customers->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_key){
            $customers = $customers->where(function($query) use ($search_key){
                $query->where('name','like','%'.$search_key.'%')
                ->orWhere('phone',$search_key)
                ->orWhere('email','like','%'.$search_key.'%');
            });
        }
        $customers = $customers->paginate(15);
        if($request->ajax()){
            return view('admin.user.customer.table',compact('customers','search_date','search_key'));
        }
        return view('admin.user.customer.index',compact('customers','search_date','search_key'),['page_title'=>'Customers']);

    }

    public function verifyStatus(Request $request){
        User::where('id',$request->user_id)->update(['is_verified'=>$request->verify_status]);
        return 1;
    }

    public function kycStatus(Request $request){
        User::where('id',$request->user_id)->update(['is_kyced'=>$request->kyc_status]);
        return 1;
    }

    public function addCustomer(){
        return view('admin.user.customer.create',['page_title'=>'Add Customer']);
    }

    public function saveCustomer(Request $request){
        $this->validate($request, [
            'type' => 'required',
            'name' => 'required|string|max:150',
            'phone' => 'required|min:10|max:10|unique:users,phone',
            'password' =>'required|string|min:8'
        ]);
        if($request->email){
            $this->validate($request, [
                'email' => 'required|string|email|max:255|unique:users',
            ]);
        }
        if($request->referral_code){
            $this->validate($request, [
                'referral_code' => 'exists:users,referrer_code',
            ]);
        }
        if($request->pincode){
            $rule['pincode']='exists:pincodes,pincode';
        }

        $user = new User;
        $user->type = $request->type;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->referrer_code = strtoupper(generateRandomString(6));
        $user->referral_code = $request->referral_code;
        $user->password = Hash::make($request->password);
        $user->save();

        $user_address = new UserAddress;
        $user_address->user_id = $user->id;
        $user_address->country = $request->country;
        $user_address->state = $request->state;
        $user_address->city = $request->city;
        $user_address->pincode = $request->pincode;
        $user_address->landmark = $request->landmark;
        $user_address->save();

        return 1;
    }

    public function editCustomer($id){
        $customer = User::where('id',$id)->with('userAddress')->first();
        return view('admin.user.customer.edit',compact('customer'),['page_title'=>'Edit Customer']);
    }

    public function updateCustomer(Request $request){
        $this->validate($request, [
            'type' => 'required',
            'name' => 'required|string|max:150',
        ]);
        if($request->email){
            $this->validate($request, [
                'email' => 'email|unique:users,email,'. $request->user_id .'id',
            ]);
        }
        if($request->referral_code){
            $this->validate($request, [
                'referral_code' => 'exists:users,referrer_code',
            ]);
        }
        if($request->pincode){
            $rule['pincode']='exists:pincodes,pincode';
        }

        $user = User::find($request->user_id);
        $user->type = $request->type;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->referral_code = $request->referral_code;
        $user->save();

        $user_address = UserAddress::where('user_id',$request->user_id)->first();
        $user_address->user_id = $user->id;
        $user_address->country = $request->country;
        $user_address->state = $request->state;
        $user_address->city = $request->city;
        $user_address->pincode = $request->pincode;
        $user_address->landmark = $request->landmark;
        $user_address->save();

        return 1;
    }

    public function associates(Request $request){
        $search_date = $request->search_date;
        $search_key = $request->search_key;
        $search_verify_status = $request->search_verify_status;
        $search_kyc_status = $request->search_kyc_status;

        $customers = UserManager::associateWithoutTrash();
        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $customers = $customers->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_verify_status != ''){
            $customers = $customers->where('is_verified',$search_verify_status);
        }
        if($search_kyc_status != ''){
            $customers = $customers->where('is_kyced',$search_kyc_status);
        }
        if($search_key){
            $customers = $customers->where(function($query) use ($search_key){
                $query->where('name','like','%'.$search_key.'%')
                ->orWhere('phone',$search_key)
                ->orWhere('email','like','%'.$search_key.'%')
                ->orWhere('referrer_code','like','%'.$search_key.'%');
            });
        }
        $customers = $customers->with(['sponserDetail'])->withCount('associateDetail')->withSum('associateCreditWalletAmount','amount')->withSum('associateDebitWalletAmount','amount')->orderBy('created_at','desc')->paginate(15);
        if($request->ajax()){
            return view('admin.user.associate.table',compact('customers','search_date','search_key','search_verify_status','search_kyc_status'));
        }
        return view('admin.user.associate.index',compact('customers','search_date','search_key','search_verify_status','search_kyc_status'),['page_title'=>'Associates']);

    }

    public function addAssociate(){
        return view('admin.user.associate.create',['page_title'=>'Add Associate']);
    }

    public function saveAssociate(Request $request){
        $this->validate($request, [
            'type' => 'required',
            'name' => 'required|string|max:150',
            'phone' => 'required|min:10|max:10|unique:users,phone',
            'password' =>'required|string|min:8'
        ]);
        if($request->email){
            $this->validate($request, [
                'email' => 'required|string|email|max:255|unique:users',
            ]);
        }
        if($request->referral_code){
            $this->validate($request, [
                'referral_code' => 'exists:users,referrer_code',
            ]);
        }
        if($request->pincode){
            $rule['pincode']='exists:pincodes,pincode';
        }

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
        $user_profile->level = $request->level;
        $user_profile->save();


        $user_address = new UserAddress;
        $user_address->user_id = $user->id;
        $user_address->country = $request->country;
        $user_address->state = $request->state;
        $user_address->city = $request->city;
        $user_address->pincode = $request->pincode;
        $user_address->landmark = $request->landmark;
        $user_address->save();

        return 1;
    }

    public function editAssociate($id){
        $customer = User::where('id',$id)->with('userAddress')->first();
        return view('admin.user.associate.edit',compact('customer'),['page_title'=>'Edit Associate']);
    }

    public function updateAssociate(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:150',
        ]);
        if($request->email){
            $this->validate($request, [
                'email' => 'email|unique:users,email,'. $request->user_id .'id',
            ]);
        }
        if($request->referral_code){
            $this->validate($request, [
                'referral_code' => 'exists:users,referrer_code',
            ]);
        }
        if($request->pincode){
            $rule['pincode']='exists:pincodes,pincode';
        }

        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->referral_code = $request->referral_code;
        $user->save();

        UserProfile::updateOrCreate([
            'user_id'=>$request->user_id
        ],[
            'level'=>$request->level
        ]);
        $user_profile = UserProfile::where('user_id',$request->user_id)->first();
        $user_profile->user_id = $user->id;
        $user_profile->level = $request->level;
        $user_profile->save();

        $user_address = UserAddress::where('user_id',$request->user_id)->first();
        $user_address->user_id = $user->id;
        $user_address->country = $request->country;
        $user_address->state = $request->state;
        $user_address->city = $request->city;
        $user_address->pincode = $request->pincode;
        $user_address->landmark = $request->landmark;
        $user_address->save();

        return 1;
    }

    public function updateProfile(Request $request){
        $user_profile = UserProfile::where('user_id',$request->user_id)->first();
        if(!$user_profile){
            $user_profile = new UserProfile;
            $user_profile->user_id = $request->user_id;
        }
        if($request->has('avatar')){
            $user_profile->avatar = imageUpload($request->file('avatar'),'frontend/images/user/avatars');
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
        $user = User::where('id',$request->user_id)->first();
        if($user->type == 'customer'){
            return redirect()->route('admin.customers')->with('success','Profile Updated Successfully!');
        }else{
            return redirect()->route('admin.associates')->with('success','Profile Updated Successfully!');
        }
    }

    public function updateBankDetail(Request $request){
        UserBankDetail::updateOrCreate([
            'user_id'=>$request->user_id
        ],[
            'holder_name'=>$request->holder_name,
            'account_number'=>$request->account_number,
            'ifsc_code'=>$request->ifsc_code,
            'bank_name'=>$request->bank_name,
            'branch_name'=>$request->branch_name,
            'upi_id'=>$request->upi_id,
        ]);
        $user = User::where('id',$request->user_id)->first();
        if($user->type == 'customer'){
            return redirect()->route('admin.customers')->with('success','Bank Detail updated Successfully!');
        }else{
            return redirect()->route('admin.associates')->with('success','Bank Detail updated Successfully!');
        }
    }

}
