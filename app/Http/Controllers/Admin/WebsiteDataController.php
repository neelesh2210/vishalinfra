<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\WebsiteData;
use App\Http\Controllers\Controller;

class WebsiteDataController extends Controller
{

    public function billingInfo(){
        $billing_info = WebsiteData::whereIn('type',['billing_name','billing_phone','billing_gst','billing_address'])->pluck('data','type');

        return view('admin.website_data.billing_info',compact('billing_info'),['page_title'=>'Billing Info']);
    }

    public function billingInfoStore(Request $request){
        if($request->billing_name){
            WebsiteData::updateOrCreate([
                'type'=>'billing_name'
            ],[
                'data'=>$request->billing_name
            ]);
        }
        if($request->billing_phone){
            WebsiteData::updateOrCreate([
                'type'=>'billing_phone'
            ],[
                'data'=>$request->billing_phone
            ]);
        }
        if($request->billing_gst){
            WebsiteData::updateOrCreate([
                'type'=>'billing_gst'
            ],[
                'data'=>$request->billing_gst
            ]);
        }
        if($request->billing_address){
            WebsiteData::updateOrCreate([
                'type'=>'billing_address'
            ],[
                'data'=>$request->billing_address
            ]);
        }

        return back()->with('success','Data Updated Successfully!');
    }

}
