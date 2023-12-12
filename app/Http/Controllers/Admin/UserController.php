<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\CPU\UserManager;
use Illuminate\Http\Request;
use App\Models\Admin\PlanPurchase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request){
        $search_date = $request->search_date;
        $search_user_type = $request->search_user_type;
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
        if($search_user_type){
            $customers = $customers->where('type',$search_user_type);
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
            return view('admin.user.customer.table',compact('customers','search_date','search_key','search_user_type'));
        }
        return view('admin.user.customer.index',compact('customers','search_date','search_key','search_user_type'),['page_title'=>'Customers']);

    }

    public function edit($id){
        $user = User::find(decrypt($id));

        return view('admin.user.customer.edit',compact('user'),['page_title'=>'Edit Customer']);
    }

    public function update(Request $request,$id){

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|unique:users,phone,'.decrypt($id),
            'email' => 'required|email|unique:users,email,'.decrypt($id),
        ]);

        $user = User::find(decrypt($id));
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.customer.index')->with('success','Customer Updated Successfully!');
    }

    public function verifyStatus($id,$status){
        $user = User::find(decrypt($id));
        $user->is_verified = decrypt($status);
        $user->save();

        return back()->with('success','Verify Status Changed!');
    }

    public function verifyBlock($id,$status){
        $user = User::find(decrypt($id));
        $user->is_blocked = decrypt($status);
        $user->save();

        return back()->with('success','Block Status Changed!');
    }

    public function planPurchase($id){
        $user = User::find(decrypt($id));

        $plan_purchases = PlanPurchase::where('user_id',$user->id)->orderBy('id','desc')->paginate(10);

        return view('admin.user.customer.plan_purchase',compact('user','plan_purchases'),['page_title'=>'Plan Purchase']);
    }

}
