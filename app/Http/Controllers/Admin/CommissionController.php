<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Commission;
use App\Http\Controllers\Controller;

class CommissionController extends Controller
{

    public function index(Request $request){
        $commissions = Commission::with(['user','property'])->orderBy('id','asc')->paginate(15);
        if($request->ajax()){
            return view('admin.commission.table',compact('commissions'));
        }
        return view('admin.commission.index',compact('commissions'),['page_title'=>'Commission']);
    }

}
