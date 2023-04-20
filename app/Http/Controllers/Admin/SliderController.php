<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{

    public function index(){
        $sliders = Slider::orderBy('priority','asc')->get();

        return view('admin.website_setup.slider.index',compact('sliders'),['page_title'=>'Sliders']);
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $priority = Slider::orderBy('id','desc')->first();
        if($priority){
            $priority = $priority->priority + 1;
        }else{
            $priority = 1;
        }
        $slider = new Slider;
        $slider->priority = $priority;
        $slider->image = imageUpload($request->file('image'),'backend/img/sliders');
        $slider->link = $request->link;
        $slider->save();

        return back()->with('success','Slider Added Successfully!');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $edit_slider = Slider::find(decrypt($id));
        $sliders = Slider::orderBy('priority','asc')->get();

        return view('admin.website_setup.slider.index',compact('sliders','edit_slider'),['page_title'=>'Sliders']);
    }

    public function update(Request $request, $id){
        $slider = Slider::find(decrypt($id));
        if($request->has('image')){
            $slider->image = imageUpload($request->file('image'),'backend/img/sliders');
        }
        $slider->link = $request->link;
        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success','Slider Updated Successfully!');
    }

    public function destroy($id){
        Slider::destroy(decrypt($id));

        return back()->with('error','Slider Deleted Successfully!');
    }
}
