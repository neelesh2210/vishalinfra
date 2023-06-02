<?php

namespace App\Http\Controllers;

use App\Models\Admin\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\InstamojoController;

class PlanController extends Controller
{

    public function plan(){
        $plans = Plan::orderBy('priority','asc')->get();

        return view('frontend.plan',compact('plans'));
    }

    public function planPurchase(Request $request){
        $plan = Plan::find($request->plan_id);
        $instamojo = new InstamojoController;
        return $instamojo->pay($plan);
    }

    public function buy(Request $request){
        return session()->get('data');
        return $request->all();
    }

}
