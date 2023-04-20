<?php

namespace App\Http\Controllers\Admin;

use App\CPU\PhaseManager;
use App\Models\Admin\Phase;
use App\CPU\PropertyManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhaseController extends Controller
{

    public function index(Request $request){
        $search_project = $request->search_project;
        $search_key = $request->search_key;
        $phases = PhaseManager::withoutTrash()->orderBy('created_at','desc');

        if($search_project){
            $phases = $phases->where('project_id',$search_project);
        }
        if($search_key){
            $phases = $phases->where('name','like','%'.$search_key.'%');
        }

        $phases = $phases->paginate(15);
        if($request->ajax()){
            return view('admin.phase.table',compact('phases','search_project','search_key'));
        }

        return view('admin.phase.index',compact('phases','search_project','search_key'),['page_title'=>'Phases']);
    }

    public function create(){
        return view('admin.phase.create',['page_title'=>'Add Phase']);
    }

    public function store(Request $request){
        $phase = new Phase;
        $phase->project_id = $request->project_id;
        $phase->name = $request->name;
        $phase->number_of_plot = $request->number_of_plot;
        $phase->save();

        return redirect()->route('admin.phase.index')->with('success','Phase Added Successfully!');
    }

    public function edit($id){
        $phase = Phase::find($id);

        return view('admin.phase.edit',compact('phase'),['page_title'=>'Edit Phase']);
    }

    public function update(Request $request,$id){
        $phase = Phase::find($id);
        $phase->project_id = $request->project_id;
        $phase->name = $request->name;
        $phase->number_of_plot = $request->number_of_plot;
        $phase->save();

        return redirect()->route('admin.phase.index')->with('success','Phase Updated Successfully!');
    }

    public function destroy($id){
        Phase::where('id',$id)->update(['is_delete'=>'1']);

        return back()->with('error','Phase Deleted Successfully!');
    }

    public function getPhase($project_id){
        return PhaseManager::withoutTrash()->where('project_id',$project_id)->get();
    }

    public function getPlotNumber($phase_id){
        $propertis = PropertyManager::withoutTrash()->where('phase_id',$phase_id)->pluck('plot_number');
        $phases = PhaseManager::withoutTrash()->where('id',$phase_id)->first();

        $plot_number = [];

        for($i=1;$i<=$phases->number_of_plot;$i++){
            $plot_number[] = $i;
        }
        return array_diff($plot_number,$propertis->toArray());
    }

}
