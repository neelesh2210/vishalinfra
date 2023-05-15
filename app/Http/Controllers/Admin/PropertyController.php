<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\CPU\PhaseManager;
use App\CPU\PropertyManager;
use Illuminate\Http\Request;
use App\Models\Admin\Property;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{

    public function index(Request $request){
        $search_key = $request->search_key;
        $search_price = $request->search_price;
        $search_bedroom = $request->search_bedroom;
        $search_room_type = $request->search_room_type;
        $search_city = $request->search_city;
        $search_property = $request->search_property;
        $search_project = $request->search_project;
        $search_status = $request->search_status;

        $properties = PropertyManager::withoutTrash();
        if($search_project){
            $properties = $properties->where('project_id',$search_project);
        }
        if($search_property){
            $properties = $properties->where('properties_type',$search_property);
        }
        if($search_city){
            $properties = $properties->where('city',$search_city);
        }
        if($search_room_type){
            $properties = $properties->where('furnished_status',$search_room_type);
        }
        if($search_bedroom){
            $properties = $properties->where('bedroom',$search_bedroom);
        }
        if($search_price){
            if($search_price == 'price_high_low'){
                $sortBy = 'final_price';
                $sortType = 'desc';
            }elseif($search_price == 'price_low_high'){
                $sortBy = 'final_price';
                $sortType = 'asc';
            }elseif($search_price == 'carpet_high_low'){
                $sortBy = 'carpet_area';
                $sortType = 'desc';
                $properties = $properties->where('carpet_area','!=',null);
            }elseif($search_price == 'carpet_low_high'){
                $sortBy = 'carpet_area';
                $sortType = 'asc';
                $properties = $properties->where('carpet_area','!=',null);
            }
            $properties = $properties->orderBy($sortBy,$sortType);
        }
        if($search_status != null){
            $properties = $properties->where('is_status',$search_status);
        }
        if($search_key){
            $properties = $properties->where('name','like','%'.$search_key.'%');
        }

        $properties = $properties->with(['project','phase'])->orderBy('id','desc')->paginate(15);

        if($request->ajax()){
            return view('admin.property.table',compact('properties','search_key','search_price','search_bedroom','search_room_type','search_city','search_property','search_project','search_status'));
        }

        return view('admin.property.index',compact('properties','search_key','search_price','search_bedroom','search_room_type','search_city','search_property','search_project','search_status'),['page_title'=>'Properties']);
    }

    public function create(){
        return view('admin.property.create',['page_title'=>'Add Property']);
    }

    public function store(Request $request){
        $property_number = Property::orderBy('id','desc')->first();
        if($property_number){
            $property_number = $property_number->property_number + 1;
        }else{
            $property_number = 10000001;
        }
        $property=new Property;
        $property->slug=str_replace(' ','-',$request->name).'-'.generateRandomString(4);
        $property->added_by=Auth::guard('admin')->user()->id;
        $property->project_id=$request->project_id;
        $property->property_number=$property_number;
        $property->name=$request->name;
        $property->properties_type=$request->properties_type;

        if($request->properties_type == 'plot'){
            $property->plot_area=$request->plot_area;
            $property->plot_length=$request->plot_length;
            $property->plot_breadth=$request->plot_breadth;
            $property->self_tieup=$request->self_tieup;
            $property->plot_type=$request->plot_type;
            $property->phase_id=$request->phase_id;
            $property->plot_number=$request->plot_number;
            $property->facing=$request->facing;
            $property->featuers=json_encode($request->featuers);

            $property->furnished_status=null;
            $property->bedroom=null;
            $property->balconies=null;
            $property->bathroom=null;
            $property->floor_no=null;
            $property->total_floor=null;
            $property->carpet_area=null;
            $property->super_area=null;

        }elseif($request->properties_type == 'flat_apartment' || $request->properties_type == 'residental_house'){
            $property->furnished_status=$request->furnished_status;
            $property->bedroom=$request->bedroom;
            $property->balconies=$request->balconies;
            $property->bathroom=$request->bathroom;
            $property->floor_no=$request->floor_no;
            $property->total_floor=$request->total_floor;
            $property->carpet_area=$request->carpet_area;
            $property->super_area=$request->super_area;

            $property->plot_area=null;
            $property->plot_length=null;
            $property->plot_breadth=null;
            $property->self_tieup=null;
            $property->plot_type=null;
            $property->phase_id=null;
            $property->plot_number=null;
            $property->facing=null;
            $property->featuers=null;
        }elseif($request->properties_type == 'commerical_space'){
            $property->furnished_status=$request->furnished_status;
            $property->balconies=$request->balconies;
            $property->bathroom=$request->bathroom;
            $property->floor_no=$request->floor_no;
            $property->total_floor=$request->total_floor;
            $property->carpet_area=$request->carpet_area;
            $property->super_area=$request->super_area;

            $property->plot_area=null;
            $property->plot_length=null;
            $property->plot_breadth=null;
            $property->self_tieup=null;
            $property->plot_type=null;
            $property->phase_id=null;
            $property->plot_number=null;
            $property->facing=null;
            $property->featuers=null;
        }

        $property->transaction_type=$request->transaction_type;
        $property->prossession_status=$request->prossession_status;

        $property->expected_price=$request->expected_price;
        $property->price=$request->price;
        $property->booking_amount=$request->booking_amount;
        $property->maintenance_charge=$request->maintenance_charge;
        $property->token_money=$request->token_money;
        $property->base_price=$request->base_price;
        $property->agent_price=$request->agent_price;
        $property->final_price=$request->final_price;
        if($request->gallery_image){
            $gall_imgs = [];
            foreach($request->gallery_image as $gallery_image){
                $gall_imgs[] = imageUpload($gallery_image,'backend/img/properies');
            }
            $property->photos=json_encode($gall_imgs);
        }

        $property->thumbnail_img=imageUpload($request->file('image'),'backend/img/properies');;
        $property->remark=$request->remark;
        $property->save();

        return redirect()->route('admin.property.index')->with('success','Property Added Successfully!');
    }

    public function edit($id){
        $property = Property::find(decrypt($id));

        return view('admin.property.edit',compact('property'),['page_title'=>'Edit Property']);
    }

    public function update(Request $request,$id){

        $property=Property::find(decrypt($id));
        $property->project_id=$request->project_id;

        // $property->slug=str_replace(' ','-',$request->name).'-'.generateRandomString(4);
        $property->name=$request->name;
        $property->properties_type=$request->properties_type;

        if($request->properties_type == 'plot'){
            $property->plot_area=$request->plot_area;
            $property->plot_length=$request->plot_length;
            $property->plot_breadth=$request->plot_breadth;
            $property->self_tieup=$request->self_tieup;
            $property->plot_type=$request->plot_type;
            $property->phase_id=$request->phase_id;
            $property->plot_number=$request->plot_number;
            $property->facing=$request->facing;
            $property->featuers=json_encode($request->featuers);

            $property->furnished_status=null;
            $property->bedroom=null;
            $property->balconies=null;
            $property->bathroom=null;
            $property->floor_no=null;
            $property->total_floor=null;
            $property->carpet_area=null;
            $property->super_area=null;

        }elseif($request->properties_type == 'flat_apartment' || $request->properties_type == 'residental_house'){
            $property->furnished_status=$request->furnished_status;
            $property->bedroom=$request->bedroom;
            $property->balconies=$request->balconies;
            $property->bathroom=$request->bathroom;
            $property->floor_no=$request->floor_no;
            $property->total_floor=$request->total_floor;
            $property->carpet_area=$request->carpet_area;
            $property->super_area=$request->super_area;

            $property->plot_area=null;
            $property->plot_length=null;
            $property->plot_breadth=null;
            $property->self_tieup=null;
            $property->plot_type=null;
            $property->phase_id=null;
            $property->plot_number=null;
            $property->facing=null;
            $property->featuers=null;
        }elseif($request->properties_type == 'commerical_space'){
            $property->furnished_status=$request->furnished_status;
            $property->balconies=$request->balconies;
            $property->bathroom=$request->bathroom;
            $property->floor_no=$request->floor_no;
            $property->total_floor=$request->total_floor;
            $property->carpet_area=$request->carpet_area;
            $property->super_area=$request->super_area;

            $property->plot_area=null;
            $property->plot_length=null;
            $property->plot_breadth=null;
            $property->self_tieup=null;
            $property->plot_type=null;
            $property->phase_id=null;
            $property->plot_number=null;
            $property->facing=null;
            $property->featuers=null;
        }

        $property->transaction_type=$request->transaction_type;
        $property->prossession_status=$request->prossession_status;

        $property->expected_price=$request->expected_price;
        $property->price=$request->price;
        $property->booking_amount=$request->booking_amount;
        $property->maintenance_charge=$request->maintenance_charge;
        $property->token_money=$request->token_money;
        $property->base_price=$request->base_price;
        $property->agent_price=$request->agent_price;
        $property->final_price=$request->final_price;
        if($request->gallery_image){
            $gall_imgs = [];
            foreach($request->gallery_image as $gallery_image){
                $gall_imgs[] = imageUpload($gallery_image,'backend/img/properies');
            }
            $property->photos=json_encode($gall_imgs);
        }
        if($request->image){
            $property->thumbnail_img=imageUpload($request->file('image'),'backend/img/properies');;
        }
        $property->remark=$request->remark;
        $property->save();

        return redirect()->route('admin.property.index')->with('success','Property Updated Successfully!');
    }

    public function destroy($id){
        Property::where('id',decrypt($id))->update(['is_delete'=>'1']);

        return back()->with('error','Property Deleted Successfully!');
    }

    public function duplicateProperty($property_id){

        $old_property = Property::find($property_id);

        $propertis = PropertyManager::withoutTrash()->where('phase_id',$old_property->phase_id)->pluck('plot_number');
        $phases = PhaseManager::withoutTrash()->where('id',$old_property->phase_id)->first();

        $plot_number = [];
        if($phases){
            for($i=1;$i<=$phases->number_of_plot;$i++){
                $plot_number[] = $i;
            }
            $remaining_plot_number = array_values(array_diff($plot_number,$propertis->toArray()));
            $plot_number_count = count($remaining_plot_number);
            if($plot_number_count > 0){
                $new_property = $old_property->replicate();
                $property_number = Property::orderBy('id','desc')->first();
                if($property_number){
                    $property_number = $property_number->property_number + 1;
                }else{
                    $property_number = 10000001;
                }
                $new_property->slug=str_replace(' ','-',$old_property->name).'-'.generateRandomString(4);
                $new_property->property_number = $property_number;
                $new_property->plot_number=$remaining_plot_number[0];
                $new_property->booking_status = 'available';
                $new_property->save();

                return back()->with('success','Property Duplicated Successfully!');
            }else{
                return back()->with('error','No Plot in this Phase!');
            }
        }else{
            $new_property = $old_property->replicate();
            $property_number = Property::orderBy('id','desc')->first();
            if($property_number){
                $property_number = $property_number->property_number + 1;
            }else{
                $property_number = 10000001;
            }
            $new_property->slug=str_replace(' ','-',$old_property->name).'-'.generateRandomString(4);
            $new_property->property_number = $property_number;
            $new_property->booking_status = 'available';
            $new_property->save();

            return back()->with('success','Property Duplicated Successfully!');
        }

    }

}
