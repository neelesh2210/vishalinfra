<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\PlanPurchase;
use App\Http\Controllers\Controller;

class PurchasePlanController extends Controller
{

    public function index(){
        $purchase_plans = PlanPurchase::orderBy('id','desc')->paginate(10);

        return view('admin.purchase_plan.index',compact('purchase_plans'),['page_title'=>'Purchase Plans']);
    }

}
