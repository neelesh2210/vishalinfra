<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use App\Models\Admin\Admin;
use App\CPU\PropertyManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function index()
    {
        $properties = PropertyManager::withoutTrash()->get()->count();

        return view('admin.dashboard',compact('properties'),['page_title'=>'Dashboard']);
    }

    public function changePassword(Request $request){
        Admin::where('id',Auth::guard('admin')->user()->id)->update([
            'password'=>Hash::make($request->new_password)
        ]);

        return back()->with('success','Password Changed Successfully!');
    }

}
