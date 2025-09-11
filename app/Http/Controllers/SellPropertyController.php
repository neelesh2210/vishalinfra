<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\CPU\PropertyManager;
use App\Models\BookProperty;
use Illuminate\Http\Request;
use App\Models\Admin\Property;
use App\Models\InstallmentRequest;

class SellPropertyController extends Controller
{

    public function index(Request $request) {
        $search_status = $request->search_status;
        $search_key = $request->search_key;

        $properties = Property::whereNotNull('project_id')->when($search_status, function($query) use ($search_status) {
            $query->where('booking_status', $search_status);
        })->when($search_key, function($query) use ($search_key) {
            $query->where('name','like','%'.$search_key.'%');
        })->with('project')->with('bookProperty')->latest()->paginate(10);

        return view('frontend.user.property.sell_property.index', compact('properties', 'search_status', 'search_key'));
    }

    public function sellPropertyDetail(Request $request, $property_id){
        $property = PropertyManager::withoutTrash()->where('id',decrypt($property_id))->first();

        $property_installment = InstallmentRequest::where('property_number', $property->property_number)->first();

        return view('frontend.user_dashboard.sell_property.detail',compact('property', 'property_installment'));
    }

    public function bookProperty(Request $request, $property_id) {
        $property = PropertyManager::withoutTrash()->where('id',decrypt($property_id))->first();
        if(!$property){
            return back()->with('error','Property Not Available!');
        }

        $book_property = BookProperty::where('property_id',$property->id)->whereIn('booking_status',['on_hold','reserved','booked','registred'])->latest('id')->first();
        $total_installment_amount = Installment::where('booking_id',$book_property?->id)->sum('final_amount');
        $total_paying_amount = $total_installment_amount + $request->amount;

        if($total_paying_amount > $property->final_price){
            return back()->with('error','You can not pay more then final Price!');
        }

        $installment_request = InstallmentRequest::where('property_number',$property->property_number)->where('status','pending')->first();

        if($installment_request){
            return back()->with('error','You have already Pending Installment Request');
        }

        if(!$book_property) {
            $request->validate([
                'payment_type'      => 'required|in:cash,online,rtgs_neft,cheque,dd,upi',
                'customer_name'     => 'required',
                'customer_email'    => 'required|email',
                'customer_phone'    => 'required|digits:10',
                'amount'            => 'required|integer',
            ]);
        }else{
            $request->validate([
                'payment_type'      => 'required|in:cash,online,rtgs_neft,cheque,dd,upi',
                'amount'            => 'required|integer',
            ]);
        }

        $installment_request                        = new InstallmentRequest;
        if($book_property) {
            $installment_request->booking_id        = $book_property->booking_id;
            $installment_request->customer_name     = $book_property->customer_name;
            $installment_request->customer_email    = $book_property->customer_email;
            $installment_request->customer_phone    = $book_property->customer_phone;
        }else {
            $installment_request->customer_name     = $request->customer_name;
            $installment_request->customer_email    = $request->customer_email;
            $installment_request->customer_phone    = $request->customer_phone;
        }
        $installment_request->property_number   = $property->property_number;
        $installment_request->amount            = $request->amount;
        $installment_request->installment_by    = auth()->guard('web')->user()->id;
        $installment_request->payment_type      = $request->payment_type;
        $installment_request->status            = 'pending';
        $installment_request->save();

        return redirect()->route('user.sell.property.index')->with('success', 'Property booked successfully!');
    }

}
