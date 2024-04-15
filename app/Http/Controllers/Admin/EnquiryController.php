<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnquiryController extends Controller
{

    public function index(Request $request){
        $search_date = $request->search_date;
        $search_property_type = $request->search_property_type;
        $search_city = $request->search_city;
        $search_key = $request->search_key;

        $enquiries = Enquiry::orderBy('id','desc');

        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $enquiries = $enquiries->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_property_type){
            $enquiries = $enquiries->whereHas('property',function($q) use ($search_property_type){
                $q->where('properties_type',$search_property_type);
            });
        }
        if($search_city){
            $enquiries = $enquiries->whereHas('property',function($q) use ($search_city){
                $q->where('city',$search_city);
            });
        }
        if($search_key){
            $enquiries = $enquiries->where('name','LIKE','%'.$search_key.'%')->orWhere('phone',$search_key);
        }

        $enquiries = $enquiries->paginate(10);

        return view('admin.enquiry.index',compact('enquiries','search_date','search_property_type','search_city','search_key'),['page_title'=>'Enquiry List']);
    }

}
