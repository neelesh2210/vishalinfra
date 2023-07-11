<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Admin\Plan;
use Illuminate\Http\Request;
use App\Models\Admin\PlanPurchase;
use App\Http\Controllers\InstamojoController;

class PlanController extends Controller
{

    public function plan(){
        $plans = Plan::orderBy('priority','asc')->get();

        return view('frontend.plan',compact('plans'));
    }

    public function index(){
        $subsriptions =  PlanPurchase::where('user_id',Auth::guard('web')->user()->id)->get();

        return view('frontend.user.plan.index',compact('subsriptions'));
    }

    public function attemptPlanPurchase(Request $request){
        $plan = Plan::find($request->plan_id);
        $instamojo = new InstamojoController;
        return $instamojo->pay($plan);
    }

    public function planPurchase(Request $request){
        $plan = session()->get('data');
        $plan_purchase = new PlanPurchase;
        $plan_purchase->user_id = Auth::guard('web')->user()->id;
        $plan_purchase->plan_id = $plan->id;
        $plan_purchase->number_of_property = $plan->number_of_property;
        $plan_purchase->duration_in_day = $plan->duration_in_day;
        $plan_purchase->price = $plan->price;
        $plan_purchase->discounted_price = $plan->discounted_price;
        $plan_purchase->payment_detail = $request->payment_detalis;
        $plan_purchase->payment_status = 'success';

        $date = Carbon::now();
        $expiry_at = $date->addDays($plan->duration_in_day);

        $plan_purchase->expiry_at = $expiry_at;
        $plan_purchase->save();

        session()->forget('data');

        return redirect()->route('user.dashboard')->with('success','Payment Successfully!');
    }

}
