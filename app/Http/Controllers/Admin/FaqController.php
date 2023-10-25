<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{

    public function index(){
        $faqs = Faq::orderBy('id','desc')->get();

        return view('admin.faq.index',compact('faqs'),['page_title'=>'Faq List']);
    }

    public function create(){
        return view('admin.faq.create',['page_title'=>'Add FAQ']);
    }

    public function store(Request $request){
        $this->validate($request,[
            'question'=>'required',
            'answer'=>'required',
        ]);
        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect()->route('admin.faqs.index')->with('success','FAQ Added Successfully!');
    }

    public function edit($id){
        $faq = Faq::find($id);

        return view('admin.faq.edit',compact('faq'),['page_title'=>'Edit FAQ']);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'question'=>'required',
            'answer'=>'required',
        ]);
        $faq = Faq::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect()->route('admin.faqs.index')->with('success','FAQ Updated Successfully!');
    }

    public function destroy($id){
        Faq::destroy($id);

        return redirect()->route('admin.faqs.index')->with('error','FAQ Deleted Successfully!');
    }

}
