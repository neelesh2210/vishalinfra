<?php

namespace App\Http\Controllers\Admin;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnquiryController extends Controller
{

    public function index(){
        $enquiries = Enquiry::orderBy('id','desc')->paginate(10);

        return view('admin.enquiry.index',compact('enquiries'),['page_title'=>'Enquiry List']);
    }

}
