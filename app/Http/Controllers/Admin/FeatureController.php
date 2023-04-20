<?php

namespace App\Http\Controllers\Admin;

use App\CPU\FeatureManager;
use Illuminate\Http\Request;
use App\Models\Admin\Feature;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{

    public function index(Request $request){
        $search_key = $request->search_key;

        $features = FeatureManager::withoutTrash()->orderBy('name','asc');
        if($search_key){
            $features = $features->where('name','like','%'.$search_key.'%');
        }
        $features = $features->paginate(15);
        if($request->ajax()){
            return view('admin.feature.table',compact('features','search_key'));
        }
        return view('admin.feature.index',compact('features','search_key'),['page_title'=>'Features']);
    }

    public function store(Request $request){
        Feature::create(['name'=>$request->name]);

        return back()->with('success','Feature Added Successfully!');
    }

    public function edit(Request $request,$id){
        $search_key = $request->search_key;
        $edit_feature = Feature::find($id);

        $features = FeatureManager::withoutTrash()->orderBy('name','asc');
        if($search_key){
            $features = $features->where('name','like','%'.$search_key.'%');
        }
        $features = $features->paginate(15);
        if($request->ajax()){
            return view('admin.feature.table',compact('features','search_key'));
        }
        return view('admin.feature.index',compact('features','edit_feature','search_key'),['page_title'=>'Features']);
    }

    public function update(Request $request,$id){
        Feature::where('id',$id)->update(['name'=>$request->name]);

        return redirect()->route('admin.feature.index')->with('success','Feature Updated Sauccessfully!');
    }

    public function destroy($id){
        Feature::where('id',$id)->update(['is_delete'=>'1']);

        return back()->with('error','Feature Deleted Successfully!');
    }

}
