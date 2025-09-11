<?php

namespace App\Http\Controllers\Admin;

use App\Models\BookProperty;
use Illuminate\Http\Request;
use App\Models\Admin\Property;
use App\Models\RefundProperty;
use App\Http\Controllers\Controller;

class RefundPropertyController extends Controller
{

    public function index($book_property_id){
        $book_property = BookProperty::whereHas('property',function($query){
            $query->where('is_delete','0')->whereNotIn('booking_status',['available','sold']);
        })->where('book_property_id',$book_property_id)->with('property','user')->where('booking_status','!=','refunded')->withSum('installments','final_amount')->first();

        return view('admin.refund_property.index',compact('book_property'),['page_title'=>'Refund Property']);
    }

    public function store(Request $request,$book_property_id){
        $book_property = BookProperty::whereHas('property',function($query){
            $query->where('is_delete','0')->whereNotIn('booking_status',['available','sold']);
        })->where('book_property_id',$book_property_id)->with('property','user')->withSum('installments','final_amount')->first();

        $refund_property = RefundProperty::where('booking_id',$book_property->id)->first();
        if($refund_property){
            return back()->with('error','You can not Refund this property!');
        }else{
            $refund_property = new RefundProperty;
            $refund_property->booking_id = $book_property->id;
            $refund_property->amount = $request->total_refund_amount;
            $refund_property->save();

            $book_property->booking_status = 'refunded';
            $book_property->save();

            $property = Property::where('id',$book_property->property_id)->first();
            $property->booking_status = 'available';
            $property->save();

            return redirect()->route('admin.booked.property.index')->with('success','Property Refunded Successfully!');
        }
    }

    public function list(){
        $refund_properties = RefundProperty::with('bookProperty.property')->latest()->paginate(10);

        return view('admin.refund_property.list',compact('refund_properties'),['page_title'=>'Refund Property List']);
    }

}
