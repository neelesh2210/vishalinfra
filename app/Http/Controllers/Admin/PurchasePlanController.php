<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\PlanPurchase;
use App\Http\Controllers\Controller;

class PurchasePlanController extends Controller
{

    public function index(Request $request){
        $search_purchase_date = $request->search_purchase_date;
        $search_expiry_date = $request->search_expiry_date;
        $search_package = $request->search_package;
        $search_key = $request->search_key;

        $purchase_plans = PlanPurchase::orderBy('id','desc');

        if($search_purchase_date){
            $dates=explode('-',$search_purchase_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_purchase_date=$dates[0].'-'.$dates[1];
            $purchase_plans = $purchase_plans->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_package){
            $purchase_plans = $purchase_plans->where('plan_id', $search_package);
        }
        if($search_key){
            $purchase_plans = $purchase_plans->whereHas('user',function($q) use ($search_key){
                $q->where('name','LIKE','%'.$search_key.'%')->orWhere('phone',$search_key);
            });
        }

        $purchase_plans = $purchase_plans->paginate(10);

        return view('admin.purchase_plan.index',compact('purchase_plans','search_purchase_date','search_expiry_date','search_package','search_key'),['page_title'=>'Purchase Plans']);
    }

}
