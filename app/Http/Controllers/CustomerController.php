<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function index(Request $request){
        $search_key = $request->search_key;

        $customers = User::where('added_by', auth()->guard('web')->user()->id)->when($search_key, function($query) use ($search_key) {
            $query->where(function($q) use ($search_key) {
                $q->where('user_name', $search_key)
                  ->orWhere('name', 'like', '%' . $search_key . '%')
                  ->orWhere('email', $search_key)
                  ->orWhere('phone', $search_key);
            });
        })->latest()->paginate(10);

        return view('frontend.user.customer.index',compact('customers', 'search_key'));
    }

    public function create(){
        return view('frontend.user.customer.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'      => 'required|string|max:150',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone'     => 'required|digits:10|unique:users,phone',
            'password'  =>'required|string|min:8',
        ]);

        $user               = new User;
        $user->added_by     = auth()->guard('web')->user()->id;
        $user->user_name    = explode(' ',$request->name)[0].generateRandomString(4);
        $user->type         = 'buyer_owner';
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->password     = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.customer.index')->with('success','Customer Added Successfully!');
    }

    public function edit($user_name){
        $user = User::where('added_by', auth()->guard('web')->user()->id)->where('type', 'buyer_owner')->where('user_name', $user_name)->first();

        if(!$user) {
            return redirect()->route('user.customer.index')->with('error', 'Customer not found!');
        }

        return view('frontend.user.customer.edit', compact('user'));
    }

    public function update(Request $request, $user_name){
        $user = User::where('added_by', auth()->guard('web')->user()->id)->where('type', 'buyer_owner')->where('user_name', $user_name)->first();

        if(!$user) {
            return redirect()->route('user.customer.index')->with('error', 'Customer not found!');
        }
        $request->validate([
            'name'      => 'required|string|max:150',
            'email'     => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone'     => 'required|digits:10|unique:users,phone,' . $user->id,
        ]);

        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->save();

        return redirect()->route('user.customer.index')->with('success','Customer Updated Successfully!');
    }
}
