<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Plan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{

    public function index(){
        $plans = Plan::orderby('priority','asc')->get();

        return view('admin.plan.index',compact('plans'),['page_title'=>'Plans']);
    }

    public function create(){
        return view('admin.plan.create',['page_title'=>'Add Plan']);
    }

    public function store(Request $request){
        $priority = optional(Plan::orderBy('priority','desc')->first())->priority;
        if(!$priority){
            $priority = 0;
        }
        $plan = new Plan;
        $plan->priority = $priority+1;
        $plan->slug = Str::slug($request->name);
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->discounted_price = $request->discounted_price;
        $plan->number_of_property = $request->number_of_property;
        $plan->duration_in_day = $request->duration_in_day;
        $plan->image = imageUpload($request->file('image'),'backend/img/plan');
        $plan->description = $request->description;
        $plan->save();

        return redirect()->route('admin.plan.index')->with('success','Plan Added Successfully!');
    }

    public function edit(Plan $plan){
        return view('admin.plan.edit',compact('plan'),['page_title'=>'Edit Plan']);
    }

    public function update(Request $request,Plan $plan){
        $previous_priority = Plan::where('priority',$request->priority)->first();
        $current_priority = $plan;

        $previous_priority->priority = $current_priority->priority;
        $previous_priority->save();

        $plan->priority = $request->priority;
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->discounted_price = $request->discounted_price;
        $plan->number_of_property = $request->number_of_property;
        $plan->duration_in_day = $request->duration_in_day;
        if($request->has('image')){
            $plan->image = imageUpload($request->file('image'),'backend/img/plan');
        }
        $plan->description = $request->description;
        $plan->save();

        return redirect()->route('admin.plan.index')->with('success','Plan Updated Successfully!');
    }

}
