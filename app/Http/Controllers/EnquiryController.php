<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        Mail::send('frontend.email.enquiry', ['user_name'=>$enquiry->name,'phone'=>$enquiry->phone,'email'=>$enquiry->email,'property_id'=>$enquiry->property_id], function($message) use($enquiry){
            $message->to($enquiry->property->addedBy->email);
            $message->subject('Enquiry for Property');
        });

        return back()->with('success','Enquiry Submitted Successfully!');
    }

}
