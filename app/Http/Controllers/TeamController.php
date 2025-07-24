<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index(Request $request) {
        $search_key = $request->search_key;

        $teams = User::where('sponsor_code', Auth::guard('web')->user()->user_name)->when($search_key, function($query) use ($search_key){
            $query->where(function($q) use ($search_key) {
                $q->where('name', 'like', '%' . $search_key . '%')
                  ->orWhere('email', 'like', $search_key)
                  ->orWhere('user_name', $search_key);
            });
        })->latest()->paginate(10);

        return view('frontend.user.teams.index',compact('search_key', 'teams'));
    }

}
