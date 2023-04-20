<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Jobs\AddPincodes;
use Illuminate\Http\Request;
use App\Models\Admin\Pincode;
use App\Http\Controllers\Controller;

class PincodeController extends Controller
{

    public function index(Request $request){
        $search_country = $request->search_country;
        $search_state = $request->search_state;
        $search_city = $request->search_city;
        $search_key = $request->search_key;

        $pincodes = Pincode::orderBy('pincode','asc');

        if($search_country){
            $pincodes = $pincodes->where('country_id',$search_country);
        }
        if($search_state){
            $pincodes = $pincodes->where('state_id',$search_state);
        }
        if($search_city){
            $pincodes = $pincodes->where('city_id',$search_city);
        }
        if($search_key){
            $pincodes = $pincodes->where('pincode','like','%'.$search_key.'%');
        }

        $pincodes = $pincodes->with(['country','state','city'])->paginate(15)->onEachSide(-1);

        if($request->ajax()){
            return view('admin.manage_address.pincode.table',compact('pincodes','search_country','search_state','search_city','search_key'));
        }

        return view('admin.manage_address.pincode.index',compact('pincodes','search_country','search_state','search_city','search_key'),['page_title'=>'Pincodes']);
    }

    public function store(Request $request){
        $pincode = new Pincode;
        $pincode->country_id = $request->country_id;
        $pincode->state_id = $request->state_id;
        $pincode->city_id = $request->city_id;
        $pincode->pincode = $request->pincode;
        $pincode->save();

        return back()->with('success','Pincode Added Successfully!');
    }

    public function edit(Request $request,$id){
        $search_country = $request->search_country;
        $search_state = $request->search_state;
        $search_city = $request->search_city;
        $search_key = $request->search_key;
        $edit_pincode = Pincode::find(decrypt($id));
        $pincodes = Pincode::orderBy('pincode','asc')->with(['country','state','city'])->paginate(15)->onEachSide(-1);
        if($request->ajax()){
            return view('admin.manage_address.pincode.table',compact('pincodes','search_country','search_state','search_city','search_key'));
        }

        return view('admin.manage_address.pincode.index',compact('pincodes','edit_pincode','search_country','search_state','search_city','search_key'),['page_title'=>'Pincodes']);
    }

    public function update(Request $request,$id){
        $pincode = Pincode::find(decrypt($id));
        $pincode->country_id = $request->country_id;
        $pincode->state_id = $request->state_id;
        $pincode->city_id = $request->city_id;
        $pincode->pincode = $request->pincode;
        $pincode->save();

        return redirect()->route('admin.pincodes.index')->with('success','Pincode Updated Successfully!');
    }

    public function destroy($id){
        Pincode::destroy(decrypt($id));

        return redirect()->route('admin.pincodes.index')->with('error','Pincode Deleted Successfully!');
    }

    // public function addPincodes(){

    //     $pincodeJobs = new AddPincodes();
    //     $this->dispatch($pincodeJobs);

    //     return 'Data Imported Successfully!';
    // }
}
