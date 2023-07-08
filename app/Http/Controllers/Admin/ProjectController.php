<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Admin\Project;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{

    public function index(Request $request){
        $search_launch_date = $request->search_launch_date;
        $search_completion_date = $request->search_completion_date;
        $search_type = $request->search_type;
        $search_key = $request->search_key;

        $projects = Project::orderby('name','asc');

        if($search_launch_date){
            $dates=explode('-',$search_launch_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);

            $search_date=$dates[0].'-'.$dates[1];
            $projects = $projects->whereBetween('launch_date', [$da1, $da2]);
        }
        if($search_completion_date){
            $dates=explode('-',$search_completion_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);

            $search_date=$dates[0].'-'.$dates[1];
            $projects = $projects->whereBetween('completion_date', [$da1, $da2]);
        }
        if($search_type){
            $projects = $projects->where('project_type',$search_type);
        }
        if($search_key){
            $projects = $projects->where('name','LIKE','%'.$search_key.'%');
        }

        $projects = $projects->paginate(10);

        if($request->ajax()){
            return view('admin.project.table',compact('projects','search_launch_date','search_completion_date','search_type','search_key'));
        }

        return view('admin.project.index',compact('projects','search_launch_date','search_completion_date','search_type','search_key'),['page_title'=>'Project List']);
    }

    public function edit($id){
        $project = Project::find(decrypt($id));

        return view('admin.project.edit',compact('project'),['page_title'=>'Edit Project']);
    }

    public function update(Request $request,$id){
        $project = Project::find(decrypt($id));
        $project->name = $request->name;
        $project->address = $request->address;
        $project->pincode = $request->pincode;
        $project->about = $request->about;
        $project->launch_date = $request->launch_date;
        $project->completion_date = $request->completion_date;
        $project->total_unit = $request->total_unit;
        $project->project_type = $request->project_type;
        $project->project_area = $request->project_area;
        $project->why_buy = $request->why_buy;
        $project->amenities = json_encode($request->amenity);
        $project->videos = json_encode($request->videos);
        $project->save();

        return redirect()->route('admin.project.index')->with('success','Project Updated Successfully!');
    }

    public function status($id,$status){
        $project = Project::find(decrypt($id));
        $project->is_active = decrypt($status);
        $project->save();

        return back()->with('success','Project Stauts Changed Successfully!');
    }

}
