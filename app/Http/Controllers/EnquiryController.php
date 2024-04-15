<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Models\Admin\Property;
use Craftsys\Msg91\Facade\Msg91;
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
        $this->validate($request,[
            'type'=>'required|in:property,project',
            'property_id'=>'nullable|required_if:type,property',
            'project_id'=>'nullable|required_if:type,project',
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);

        $enquiry = new Enquiry;

        if(Auth::check()){
            $enquiry->user_id = Auth::guard('web')->user()->id;
        }
        if($request->type == 'property'){
            $enquiry->property_id = $request->property_id;
        }elseif($request->type == 'project'){
            $enquiry->property_id = $request->project_id;
        }
        $enquiry->type = $request->type;
        $enquiry->name = $request->name;
        $enquiry->phone = $request->phone;
        $enquiry->email = $request->email;
        $enquiry->message = $request->message;
        $enquiry->save();

        $property = Property::find($request->property_id);

        try {
            Mail::send('frontend.email.enquiry', ['user_name'=>$enquiry->name,'phone'=>$enquiry->phone,'email'=>$enquiry->email,'property_id'=>$enquiry->property_id], function($message) use($enquiry){
                $message->to($enquiry->property->addedBy->email);
                $message->subject('Enquiry for Property');
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
        $name_phone = explode(' ',$request->name)[0].'('.$request->phone.')';
        try {
            Msg91::sms()->to('91'.$enquiry->property->addedBy->phone)->flow('655f0c87d6fc057dc844bfd2')->variable('user',$enquiry->property->addedBy->name)->variable('property',$property->name)->variable('customer', $name_phone)->send();
        } catch (\Throwable $th) {
            //throw $th;
        }

        return back()->with('success','Enquiry Submitted Successfully!');
    }

}
