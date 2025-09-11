<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Charge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChargeController extends Controller
{

    public function index(){
        return view('admin.charge.index',['page_title'=>'Charges']);
    }

    public function store(Request $request){
        Charge::updateOrCreate([
            'type'=>'service_charge'
        ],[
            'amount'=>$request->service_charge,
            'amount_type'=>'percent'
        ]);

        Charge::updateOrCreate([
            'type'=>'tds_charge'
        ],[
            'amount'=>$request->tds_charge,
            'amount_type'=>'percent'
        ]);

        Charge::updateOrCreate([
            'type'=>'token_amount'
        ],[
            'amount'=>$request->token_amount,
            'amount_type'=>$request->token_amount_type
        ]);

        Charge::updateOrCreate([
            'type'=>'booking_amount'
        ],[
            'amount'=>$request->booking_amount,
            'amount_type'=>$request->booking_amount_type
        ]);

        Charge::updateOrCreate([
            'type'=>'registry_amount'
        ],[
            'amount'=>$request->registry_amount,
            'amount_type'=>$request->registry_amount_type
        ]);

        Charge::updateOrCreate([
            'type'=>'commission_amount'
        ],[
            'amount'=>$request->commission_amount,
            'amount_type'=>$request->commission_amount_type
        ]);

        Charge::updateOrCreate([
            'type'=>'min_commission_amount'
        ],[
            'amount'=>$request->min_commission_amount,
            'amount_type'=>$request->min_commission_amount_type
        ]);

        Charge::updateOrCreate([
            'type'=>'refund_percent'
        ],[
            'amount'=>$request->refund_percent,
            'amount_type'=>'percent'
        ]);

        return back()->with('success','Amount Updated Successfully!');
    }

    public function calculateCharge(Request $request){
        $charges = Charge::all();

        if(isset($charges[0])){
            $service_charge = $charges[0]->amount;
        }else{
            $service_charge = 0;
        }

        if(isset($charges[1])){
            $tds_charge = $charges[1]->amount;
        }else{
            $tds_charge = 0;
        }

        $service_amount = ($request->amount*$service_charge)/100;
        $tds_amount = (($request->amount - $service_amount)*$tds_charge)/100;
        $final_amount = $request->amount - $service_amount - $tds_amount;

        return response()->json(['service_amount'=>round($service_amount,2),'tds_amount'=>round($tds_amount,2),'final_amount'=>round($final_amount,2)]);
    }

}
