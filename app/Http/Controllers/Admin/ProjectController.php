<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Project;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{

    public function index(Request $request){
        $search_key = $request->search_key;
        $projects = Project::where('is_delete','0');
        if($search_key){
            $projects = $projects->where(function ($query) use ($search_key) {
                $query->where('name','like','%'.$search_key.'%')
                      ->orWhere('lat',$search_key)
                      ->orWhere('long',$search_key)
                      ->orWhere('state','like','%'.$search_key.'%')
                      ->orWhere('city','like','%'.$search_key.'%')
                      ->orWhere('pincode',$search_key);
            });
        }
        $projects = $projects->paginate(15);
        if($request->ajax()){
            return view('admin.project.table',compact('projects','search_key'));
        }
        return view('admin.project.index',compact('projects','search_key'),['page_title'=>'Projects']);
    }

    public function create(){
        return view('admin.project.create',['page_title'=>'Add Project']);
    }

    public function store(Request $request){
        $project = new Project;
        $project->name = $request->name;
        $project->lat = $request->lat;
        $project->long = $request->long;
        $project->country = $request->country;
        $project->state = $request->state;
        $project->city = $request->city;
        $project->pincode = $request->pincode;
        $project->address = $request->address;
        if($request->images){
            $gall_imgs = [];
            foreach($request->images as $gallery_image){
                $gall_imgs[] = imageUpload($gallery_image,'backend/img/projects');
            }
            $project->images = json_encode($gall_imgs);
        }
        $project->description = $request->description;
        $project->save();

        return redirect()->route('admin.project.index')->with('success','Project Added Successfully!');
    }

    public function edit($id){
        $project = Project::find($id);

        return view('admin.project.edit',compact('project'),['page_title'=>'Edit Project']);
    }

    public function update(Request $request,$id){
        $project = Project::find($id);
        $project->name = $request->name;
        $project->lat = $request->lat;
        $project->long = $request->long;
        $project->country = $request->country;
        $project->state = $request->state;
        $project->city = $request->city;
        $project->pincode = $request->pincode;
        $project->address = $request->address;
        if($request->images){
            $gall_imgs = [];
            foreach($request->images as $gallery_image){
                $gall_imgs[] = imageUpload($gallery_image,'backend/img/projects');
            }
            $project->images = json_encode($gall_imgs);
        }
        $project->description = $request->description;
        $project->save();

        return redirect()->route('admin.project.index')->with('success','Project Updated Successfully!');
    }

}
