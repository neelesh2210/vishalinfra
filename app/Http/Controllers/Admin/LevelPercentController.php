<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\LevelPercent;
use App\Http\Controllers\Controller;

class LevelPercentController extends Controller
{

    public function index(){
        $level_percents = LevelPercent::orderBy('level','asc')->get();

        return view('admin.website_setup.level_percent.index',compacT('level_percents'),['page_title'=>'Level Percent']);
    }

    public function create(){

    }

    public function store(Request $request){
        LevelPercent::updateOrCreate(['level'=>$request->level],['percent'=>$request->percent]);

        return back()->with('success','Level Updated Successfully!');
    }

    public function show($id){
        return LevelPercent::where('level',$id)->first();
    }

    public function edit($id){

    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
