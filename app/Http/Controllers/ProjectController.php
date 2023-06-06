<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index(){
        return view('frontend.add_project');
    }

    public function store(Request $request){
        return $request->all();
    }

}
