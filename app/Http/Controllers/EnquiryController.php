<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{

    public function index(){
        $enquiries = Enquiry::whereHas('property',function($q){
            $q->where('added_by',Auth::guard('web')->user()->id);
        })->with('property')->orderBy('id','desc')->paginate(10);

        return view('frontend.user.enquiry.index',compact('enquiries'));
    }

    public function store(Request $request){
        $enquiry = new Enquiry;

        if(Auth::check()){
            $enquiry->user_id = Auth::guard('web')->user()->id;
        }

        $enquiry->property_id = $request->property_id;
        $enquiry->name = $request->name;
        $enquiry->phone = $request->phone;
        $enquiry->email = $request->email;
        $enquiry->save();

        return back()->with('success','Enquiry Submitted Successfully!');
    }

}
