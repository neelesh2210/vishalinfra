<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Project;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{

    public function index(){
        $projects = Project::orderby('name','asc')->paginate(10);

        return view('admin.project.index',compact('projects'),['page_title'=>'Project List']);
    }

}
