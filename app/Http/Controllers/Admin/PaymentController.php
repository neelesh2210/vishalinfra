<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Installment;
use Illuminate\Http\Request;
use App\Exports\InstallmentsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PaymentController extends Controller
{

    public function index(Request $request){
        $search_property = $request->search_property;
        $search_date = $request->search_date;

        $installments = Installment::with('booking.property.project');

        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $installments = $installments->whereBetween('created_at', [$startDate, $endDate]);
        }

        if($search_property){
            $installments = $installments->whereHas('booking',function($query) use ($search_property){
                $query->where('property_id',$search_property);
            });
        }

        if($request->has('export')){
            $installments = $installments->latest()->get();

            return Excel::download(new InstallmentsExport($installments), 'payments.xlsx');
        }

        $installments = $installments->latest()->paginate(10);

        return view('admin.payment.index',compact('installments','search_date','search_property'),['page_title'=>'Payments']);
    }

}
