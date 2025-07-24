<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Enquiry;
use App\CPU\PhaseManager;
use App\CPU\PropertyManager;
use Illuminate\Http\Request;
use App\Models\Admin\Property;
use Craftsys\Msg91\Facade\Msg91;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{

    public function index(Request $request){
        $search_key = $request->search_key;
        $search_price = $request->search_price;
        $search_bedroom = $request->search_bedroom;
        $search_room_type = $request->search_room_type;
        $search_city = $request->search_city;
        $search_property = $request->search_property;
        $search_status = $request->search_status;
        $search_user_type = $request->search_user_type;

        $properties = PropertyManager::withoutTrash();
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
        if($search_user_type){
            $properties = $properties->whereHas('addedBy',function($q) use ($search_user_type){
                $q->where('type',$search_user_type);
            });
        }
        if($search_key){
            $properties = $properties->where('name','like','%'.$search_key.'%');
        }

        $properties = $properties->orderBy('id','desc')->paginate(15);

        if($request->ajax()){
            return view('admin.property.table',compact('properties','search_key','search_price','search_bedroom','search_room_type','search_city','search_property','search_status','search_user_type'));
        }

        return view('admin.property.index',compact('properties','search_key','search_price','search_bedroom','search_room_type','search_city','search_property','search_status','search_user_type'),['page_title'=>'Properties']);
    }

    // public function create(){
    //     return view('admin.property.create',['page_title'=>'Add Property']);
    // }

    public function store(Request $request){
        $property_number = Property::orderBy('id','desc')->first();
        if($property_number){
            $property_number = $property_number->property_number + 1;
        }else{
            $property_number = 10000001;
        }
        $property=new Property;
        $property->slug=str_replace(' ','-',$request->name).'-'.generateRandomString(4);
        $property->added_by=0;
        $property->property_number=$property_number;
        $property->name=$request->name;
        $property->properties_type=$request->properties_type;

        if($request->properties_type == 'plot'){
            $property->plot_area=$request->plot_area;
            $property->plot_length=$request->plot_length;
            $property->plot_breadth=$request->plot_breadth;
            $property->self_tieup=$request->self_tieup;
            $property->plot_type=$request->plot_type;
            $property->facing=$request->facing;

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
            $property->facing=null;
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
            $property->facing=null;
        }

        $property->transaction_type=$request->transaction_type;
        $property->prossession_status=$request->prossession_status;
        $property->photos=$request->gallery_image;
        $property->thumbnail_img=$request->image;
        $property->expected_price=$request->expected_price;
        $property->price=$request->price;
        $property->booking_amount=$request->booking_amount;
        $property->maintenance_charge=$request->maintenance_charge;
        $property->token_money=$request->token_money;
        $property->base_price=$request->base_price;
        $property->agent_price=$request->agent_price;
        $property->final_price=$request->final_price;
        if(is_array($request->gallery_image)){
            $property->photos=implode(",",$request->gallery_image);
        }else{
            $property->photos='';
        }

        $property->thumbnail_img=imageUpload($request->file('image'),'backend/img/properies');;
        $property->remark=$request->remark;
        $property->save();

        return redirect()->route('admin.property.index')->with('success','Property Added Successfully!');
    }

    public function show(Property $property){
        return view('admin.property.show',compact('property'),['page_title'=>'Property Info']);
    }

    public function edit($id){
        $property = Property::find(decrypt($id));

        return view('admin.property.edit',compact('property'),['page_title'=>'Edit Property']);
    }

    public function update(Request $request,$id){

        $property=Property::find(decrypt($id));
        $property->name=$request->name;
        $property->properties_type=$request->properties_type;
        $property->city=$request->city_id;
        $property->landmark=$request->landmark;

        if($request->properties_type == 'plot'){
            $property->plot_area=$request->plot_area;
            $property->plot_length=$request->plot_length;
            $property->plot_breadth=$request->plot_breadth;
            $property->self_tieup=$request->self_tieup;
            $property->plot_type=$request->plot_type;
            $property->facing=$request->facing;

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
            $property->facing=null;
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
            $property->facing=null;
        }

        $property->transaction_type=$request->transaction_type;
        $property->prossession_status=$request->prossession_status;
        $property->price=$request->price;
        $property->booking_amount=$request->booking_amount;
        $property->maintenance_charge=$request->maintenance_charge;
        $property->discounted_price=$request->discounted_price;
        $property->final_price=$request->final_price;
        $property->commission_amount=$request->commission_amount;
        if(is_array($request->gallery_image)){
            $property->photos=implode(",",$request->gallery_image);
        }else{
            $property->photos='';
        }
        $property->thumbnail_img=$request->image;
        $property->remark=$request->remark;
        $property->meta_title=$request->meta_title;
        $property->meta_description=$request->meta_description;
        $property->meta_keyword=$request->meta_keyword;
        $property->save();

        return redirect()->route('admin.property.index')->with('success','Property Updated Successfully!');
    }

    public function destroy($id){
        Property::where('id',decrypt($id))->update(['is_delete'=>'1']);

        return back()->with('error','Property Deleted Successfully!');
    }

    public function trustSealStatus($id,$status){
        $property = Property::find($id);
        $property->is_trust_seal = $status;
        $property->save();

        return back()->with('success','Trust Seal Status Changed Successfully!');
    }

    public function featuredStatus($id,$status){
        $property = Property::find($id);
        $property->is_featured = $status;
        $property->save();

        return back()->with('success','Featured Status Changed Successfully!');
    }

    public function demandedStatus($id,$status){
        $property = Property::find($id);
        $property->is_demanded = $status;
        $property->save();

        return back()->with('success','Demanded Status Changed Successfully!');
    }

    public function trendingStatus($id,$status){
        $property = Property::find($id);
        $property->is_trending = $status;
        $property->save();

        return back()->with('success','Treanding Status Changed Successfully!');
    }

    public function publishedStatus($id,$status){
        $property = Property::with('addedBy')->where('id',$id)->first();
        $property->is_status = $status;
        $property->save();
        if($status == '1'){
            try {
                Mail::send('frontend.email.property_publishing', ['property'=>$property], function($message) use($property){
                    $message->to($property->addedBy->email);
                    $message->subject('Property Published Successful');
                });
            } catch (\Throwable $th) {
                //
            }

            try {
                Msg91::sms()->to('91'.$property->addedBy->phone)->flow('655f0be3d6fc05194314e812')->variable('user',$property->addedBy->name)->variable('property',$property->name)->send();
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        return back()->with('success','Published Status Changed Successfully!');
    }

    public function enquiry($id){
        $enquiries = Enquiry::where('property_id',decrypt($id))->paginate(10);

        return view('admin.property.enquiry',compact('enquiries'),['page_title'=>'Property Enquiry']);
    }

}
