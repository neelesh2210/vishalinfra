<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Charge;
use App\Models\Admin\Payout;
use Illuminate\Http\Request;
use App\Exports\PayoutsExport;
use App\Models\Admin\Commission;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PayoutContoller extends Controller
{

    public function index(Request $request){
        $search_key = $request->search_key;

        $users = User::when($search_key, function($query) use ($search_key) {
                            $query->where(function($qu) use ($search_key) {
                                $qu->where('name', 'LIKE', '%' . $search_key . '%')
                                ->orWhere('phone', $search_key)
                                ->orWhere('email', $search_key)
                                ->orWhere('referrer_code', $search_key);
                            });
                        })
                        ->withSum('commissions', 'commission_amount')
                        ->withSum('payouts', 'amount')
                        ->get(); // Retrieve all users matching the criteria

        // Step 2: Filter and transform the collection
        $filteredUsers = $users->filter(function ($user) {
                                $totalCommission = $user->commissions_sum_commission_amount;
                                $totalPayout = $user->payouts_sum_amount;
                                $remainingAmount = round($totalCommission - $totalPayout);

                                return $remainingAmount > 0;
                            })->map(function ($user) {
                                $totalCommission = $user->commissions_sum_commission_amount;
                                $totalPayout = $user->payouts_sum_amount;
                                $remainingAmount = $totalCommission - $totalPayout;

                                return [
                                'user_id' => $user->id,
                                'name' => $user->name,
                                'phone' => $user->phone,
                                'total_commission' => $totalCommission,
                                'total_payout' => $totalPayout,
                                'remaining_amount' => $remainingAmount,
                                ];
                            });

        // Step 3: Create a new paginator with the filtered collection
        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10; // Specify the number of items per page here
        $currentItems = $filteredUsers->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginatedUsers = new \Illuminate\Pagination\LengthAwarePaginator(
        $currentItems,
        $filteredUsers->count(),
        $perPage,
        $currentPage,
        ['path' => \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPath()]
        );

        if($request->ajax()){
            return view('admin.payout.table',compact('paginatedUsers','search_key'));
        }

        return view('admin.payout.index',compact('paginatedUsers','search_key'),['page_title'=>'Payout List']);
    }

    public function store(Request $request){
        $user = User::find($request->user_id);
        if($user){
            $user_total_commission = Commission::where('user_id',$user->id)->sum('commission_amount');
            $user_total_payout = Payout::where('user_id',$user->id)->sum('amount');
            // if($user->is_kyced == '1'){
                if(($user_total_commission - $user_total_payout) >= $request->amount){
                    $charges = Charge::all();

                    $payout = new Payout;
                    $payout->user_id = $user->id;
                    $payout->amount = $request->amount;

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

                    $payout->service_charge = $service_charge;
                    $payout->tds_charge = $tds_charge;
                    $service_amount = ($request->amount*$service_charge)/100;
                    $tds_amount = (($request->amount - $service_amount)*$tds_charge)/100;
                    $payout->final_amount = $request->amount - $service_amount - $tds_amount;
                    $payout->payment_type = $request->payment_type;
                    $payout->payment_detail = $request->payment_detail;
                    $payout->payment_status = 'success';
                    $payout->save();

                    return back()->with('success','Payout Successfull!');
                }else{
                    return back()->with('error','Amount not be greater then wallet balance!');
                }
            // }else{
            //     return back()->with('error','User KYC not approved!');
            // }
        }else{
            return back()->with('error','User Not Exists!');
        }
    }

    public function success(Request $request){
        $search_date = $request->search_date;
        $search_key = $request->search_key;

        $payouts = Payout::orderBy('id','desc');

        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $payouts = $payouts->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_key){
            $payouts = $payouts->whereHas('user',function($q) use ($search_key){
                $q->where(function ($query) use ($search_key){
                    $query->where('name','LIKE','%'.$search_key.'%')
                          ->orWhere('phone',$search_key)
                          ->orWhere('email',$search_key)
                          ->orWhere('referrer_code',$search_key);
                });
            });
        }

        if($request->has('export')){
            $payouts = $payouts->get();

            return Excel::download(new PayoutsExport($payouts), 'payouts.xlsx');
        }

        $payouts = $payouts->paginate(10);

        if($request->ajax()){
            return view('admin.payout.success_table',compact('payouts','search_date','search_key'));
        }
        return view('admin.payout.success',compact('payouts','search_date','search_key'),['page_title'=>'Payout Success']);
    }

    public function invoice($payout_id){
        $payout = Payout::find($payout_id);
        if($payout){
            return view('admin.payout.invoice',compact('payout'),['page_title'=>'Payout Invoice']);
        }else{
            return back()->with('error','No Payout Found!');
        }
    }

}
