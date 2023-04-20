<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{

    public function index(Request $request){
        $search_country = $request->search_country;
        $search_key = $request->search_key;
        $states = State::orderBy('name','asc');

        if($search_country){
            $states = $states->where('country_id',$search_country);
        }
        if($search_key){
            $states = $states->where('name','like','%'.$search_key.'%');
        }
        $states = $states->with('country')->paginate(15);

        if($request->ajax()){
            return view('admin.manage_address.state.table',compact('states','search_country','search_key'));
        }
        return view('admin.manage_address.state.index',compact('states','search_country','search_key'),['page_title'=>'States']);
    }

    public function store(Request $request){
        $state = new State;
        $state->country_id = $request->country_id;
        $state->name = $request->name;
        $state->save();

        return back()->with('success','State Added Successfully!');
    }

    public function edit(Request $request,$id){
        $search_country = $request->search_country;
        $search_key = $request->search_key;
        $states = State::orderBy('name','asc')->with('country')->paginate(15);
                $edit_state = State::find(decrypt($id));
        if($request->ajax()){
            return view('admin.manage_address.state.table',compact('states','search_country','search_key'));
        }

        return view('admin.manage_address.state.index',compact('states','edit_state','search_country','search_key'),['page_title'=>'States']);
    }

    public function update(Request $request,$id){
        $state = State::find(decrypt($id));
        $state->country_id = $request->country_id;
        $state->name = $request->name;
        $state->save();

        return redirect()->route('admin.states.index')->with('success','State Updated Successfully!');
    }

    public function destroy($id){
        State::destroy(decrypt($id));

        return redirect()->route('admin.states.index')->with('error','State Deleted Successfully!');
    }
}
