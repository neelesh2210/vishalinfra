<?php

namespace App\Http\Controllers;

use Auth;
use App\CPU\UserManager;
use App\CPU\PropertyManager;
use App\Models\BookProperty;
use Illuminate\Http\Request;
use App\Models\Admin\AssociateWallet;
use App\Models\PropertyBookingRequest;
use App\Http\Controllers\BookPropertyController;

class PropertyBookingRequestController extends Controller
{

    public function propertyBookingRequest($property_id){
        $property = PropertyManager::withoutTrash()->where('id',decrypt($property_id))->first();
        if($property){
            $property_booking_request = new PropertyBookingRequest;
            $property_booking_request->property_id = $property->id;
            $property_booking_request->token_amount = $property->token_money;
            $property_booking_request->user_id = Auth::guard('web')->user()->id;
            $property_booking_request->save();

            $property->booking_status = 'on_hold';
            $property->save();

            return back()->with('success','Booking Request Sent Successfully!');
        }else{
            return back()->with('error','Somthing went Wrong!');
        }
    }

    public function propertyBookingRequestList(Request $request){

        $user_list = UserManager::customerWithoutTrash()->where('referral_code',Auth::user()->referrer_code)->has('bookingRequest')->pluck('id');
        $property_booking_requests = PropertyBookingRequest::whereIn('user_id',$user_list->toArray())->with(['property','user'])->orderBy('id','desc')->paginate(15);

        return view('frontend.user_dashboard.booking.index',compact('property_booking_requests'));
    }

    public function propertyBookingChangeStatus($id,$status){
        $associate_wallet = associateWallet(Auth::guard('web')->user()->id);

        $property_booking_request = PropertyBookingRequest::where('id',$id)->first();
        $poperty = PropertyManager::withoutTrash()->where('id',$property_booking_request->property_id)->first();
        if($status == 'confirm'){

            if($associate_wallet['remaining_wallet_balance'] >= $poperty->token_money){
                $property_booking_request->request_status = $status;
                $property_booking_request->save();

                $book_property = new BookProperty;
                $book_property->property_id = $poperty->id;
                $book_property->token_amount = $poperty->token_money;
                $book_property->user_id = $property_booking_request->user_id;
                $book_property->staff_id = Auth::guard('web')->user()->id;
                $book_property->payment_type = 'wallet';
                $book_property->save();

                $poperty->booking_status = 'reserved';
                $poperty->save();
                AssociateWallet::create([
                    'user_id'=>Auth::guard('web')->user()->id,
                    'amount'=>$poperty->token_money,
                    'transaction_type'=>'debit'
                ]);

                $book_prperty_controller = new BookPropertyController;
                $book_prperty_controller->commissionDistribution(Auth::guard('web')->user()->id,$poperty->id,$poperty->token_money);
            }else{
                return response()->json(['msg'=>'You have not enough Balance!'],401);
            }
        }elseif($status == 'cancel'){
            $property_booking_request->request_status = $status;
            $property_booking_request->save();
            $poperty->booking_status = 'available';
            $poperty->save();
        }
    }

}
