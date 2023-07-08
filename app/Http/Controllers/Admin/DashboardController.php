<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Enquiry;
use App\Models\Admin\Admin;
use App\CPU\PropertyManager;
use Illuminate\Http\Request;
use App\Models\Admin\Project;
use App\Models\Admin\Property;
use App\Models\Admin\PlanPurchase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function index()
    {
        $properties = PropertyManager::withoutTrash()->get()->count();
        $users = User::where('is_delete','0')->get()->count();
        $agents = User::where('is_delete','0')->where('type','agent')->get()->count();
        $builders = User::where('is_delete','0')->where('type','builder')->get()->count();
        $users = User::where('is_delete','0')->get()->count();
        $enquiries = Enquiry::get()->count();
        $projects = Project::get()->count();
        $package_purchased = PlanPurchase::get()->sum('discounted_price');

        $month_names = [];
        $month_numbers = [];
        foreach( range( -5, 0 ) AS $i ) {
            $month_name = Carbon::now()->addMonth( $i )->format('F');
            $month_number = Carbon::now()->addMonth( $i )->format('m');
            array_push($month_names,$month_name);
            array_push($month_numbers,$month_number);
        }

        $month_users=[];
        foreach($month_numbers as $month_number){
            $month_user = User::whereMonth('created_at', $month_number)->get()->count();
            $month_users[]=$month_user;
        }

        $month_properties=[];
        foreach($month_numbers as $month_number){
            $month_property = Property::whereMonth('created_at', $month_number)->get()->count();
            $month_properties[]=$month_property;
        }

        $month_package_purchaseds=[];
        foreach($month_numbers as $month_number){
            $month_package_purchased = PlanPurchase::whereMonth('created_at', $month_number)->get()->sum('discounted_price');
            $month_package_purchaseds[]=$month_package_purchased;
        }

        $month_builders=[];
        foreach($month_numbers as $month_number){
            $month_builder = User::where('type','builder')->whereMonth('created_at', $month_number)->get()->sum('discounted_price');
            $month_builders[]=$month_builder;
        }

        return view('admin.dashboard',compact('properties','users','enquiries','projects','agents','builders','package_purchased','month_names','month_users','month_properties','month_package_purchaseds','month_builders'),['page_title'=>'Dashboard']);
    }

    public function changePassword(Request $request){
        Admin::where('id',Auth::guard('admin')->user()->id)->update([
            'password'=>Hash::make($request->new_password)
        ]);

        return back()->with('success','Password Changed Successfully!');
    }

}
