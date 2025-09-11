<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Admin\Commission;
use App\Http\Controllers\Controller;

class CommissionController extends Controller
{

    public function index(Request $request){
        $search_date = $request->search_date;
        $search_key = $request->search_key;

        $commissions = Commission::where('is_confirm','1')->with(['user','property','installment.booking.property','installment.booking.user']);

        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $commissions = $commissions->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_key){
            $commissions = $commissions->whereHas('user',function($q) use ($search_key){
                $q->where(function ($query) use ($search_key){
                    $query->where('name','LIKE','%'.$search_key.'%')
                          ->orWhere('phone',$search_key)
                          ->orWhere('email',$search_key)
                          ->orWhere('referrer_code',$search_key);
                });
            });
        }

        $commissions = $commissions->latest()->paginate(15);
        if($request->ajax()){
            return view('admin.commission.table',compact('commissions','search_date','search_key'));
        }
        return view('admin.commission.index',compact('commissions','search_date','search_key'),['page_title'=>'Commission']);
    }

}
