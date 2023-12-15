<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Admin\Project;

class ProjectController extends Controller
{

    public function index(Request $request){
        $search_key = $request->search_key;

        $projects = Project::orderBy('id','desc')->where('user_id',Auth::guard('web')->user()->id);

        if($search_key){
            $projects = $projects->where('name','LIKE','%'.$search_key.'%');
        }

        $projects = $projects->paginate(10);

        return view('frontend.user.project.index',compact('projects','search_key'),['page_title'=>'My Properties']);
    }

    public function create(){
        return view('frontend.user.project.create',['page_title'=>'Add New Project']);
    }

    public function store(Request $request){
        $project = new Project;
        $project->user_id = Auth::guard('web')->user()->id;
        $project->name = $request->name;
        $project->cover_image = $request->cover_image;
        $project->gallery_image = $request->gallery_image;
        $project->address = $request->address;
        $project->pincode = $request->pincode;
        $project->about = $request->about;
        $project->launch_date = $request->launch_date;
        $project->completion_date = $request->completion_date;
        $project->total_unit = $request->total_unit;
        $project->project_type = $request->project_type;
        $project->project_area = $request->project_area;
        $project->occupancy_certificated = $request->occupancy_certificated;
        $project->commencement_certificated = $request->commencement_certificated;
        $project->why_buy = $request->why_buy;
        $project->amenities = json_encode($request->amenity);
        $project->floor_plan = $request->floor_plan;
        $project->videos = json_encode($request->videos);
        $project->is_Active = '0';
        $project->save();

        return redirect()->route('user.project.list')->with('success','Project Added Successfully!');
    }

    public function edit($id){
        $project = Project::find(decrypt($id));

        return view('frontend.user.project.edit',compact('project'));
    }

    public function update(Request $request,$id){
        $project = Project::find(decrypt($id));
        $project->name = $request->name;
        $project->cover_image = $request->cover_image;
        $project->gallery_image = $request->gallery_image;
        $project->address = $request->address;
        $project->pincode = $request->pincode;
        $project->about = $request->about;
        $project->launch_date = $request->launch_date;
        $project->completion_date = $request->completion_date;
        $project->total_unit = $request->total_unit;
        $project->project_type = $request->project_type;
        $project->project_area = $request->project_area;
        $project->occupancy_certificated = $request->occupancy_certificated;
        $project->commencement_certificated = $request->commencement_certificated;
        $project->why_buy = $request->why_buy;
        $project->amenities = json_encode($request->amenity);
        $project->floor_plan = $request->floor_plan;
        $project->videos = json_encode($request->videos);
        $project->save();

        return redirect()->route('user.project.list')->with('success','Project Updated Successfully!');
    }

}
