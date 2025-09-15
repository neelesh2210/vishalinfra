<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Installment;
use App\CPU\PropertyManager;
use App\Models\BookProperty;
use Illuminate\Http\Request;
use App\Models\Admin\Project;
use App\Models\Admin\Property;
use Craftsys\Msg91\Facade\Msg91;
use App\Models\Admin\PlanPurchase;

class PropertyListingController extends Controller
{

    public function index(Request $request){
        $search_key = $request->search_key;

        $properties = PropertyManager::withoutTrash()->where('added_by',Auth::guard('web')->user()->id);
        if($search_key){
            $properties = $properties->where('name','LIKE','%'.$search_key.'%');
        }

        $properties = $properties->with('planPurchase', 'bookProperty')->orderBy('id','desc')->paginate(15);

        return view('frontend.user.property.index',compact('properties','search_key'),['page_title'=>'My Properties']);
    }

    public function create(){
        $register_properties = PropertyManager::withoutTrash()->where('added_by',Auth::guard('web')->user()->id)->get();
        $projects = Project::where('user_id',Auth::guard('web')->user()->id)->get();

        $plan_purchases = PlanPurchase::where('user_id',Auth::guard('web')->user()->id)->where('expiry_at', '>=', Carbon::now())->withcount('property')->get();
        $times = 0;
        if($register_properties->count() >= 1){
            $times = $register_properties->count();
            if($plan_purchases->count() != 0){
                return view('frontend.user.property.create',compact('times','plan_purchases','projects'),['page_title'=>'Add New Property']);
            }else{
                return redirect()->route('plan');
            }
        }else{
            $times = 0;
            return view('frontend.user.property.create',compact('times','plan_purchases','projects'),['page_title'=>'Add New Property']);
        }
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
        if(Auth::guard('web')->user()->type == 'builder'){
            $property->project_id = $request->project_id;
        }
        $property->plan_purchase_id=$request->purchase_plan_id;
        $property->added_by=Auth::guard('web')->user()->id;
        $property->property_number=$property_number;
        $property->name=$request->name;
        $property->properties_type=$request->properties_type;
        $property->property_selling_type=$request->property_selling_type;
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
        if(is_array($request->gallery_image)){
            $property->photos=implode(",",$request->gallery_image);
        }else{
            $property->photos='';
        }

        $property->amenities=json_encode($request->amenity);

        $property->thumbnail_img=$request->image;
        $property->remark=$request->remark;
        if($request->offer){
            $property->offer = $request->offer_text;
        }else{
            $property->offer = null;
        }
        $property->remark=$request->remark;
        $property->meta_title = $request->name;
        $property->is_status='0';
        $property->save();

        try {
            Msg91::sms()->to('91'.Auth::guard('web')->user()->phone)->flow('655f0cfed6fc0535a924cdf3')->variable('user',Auth::guard('web')->user()->name)->variable('property',$property->name)->send();
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->route('user.property.index')->with('success','Property Added Successfully!');
    }

    public function edit($id){
        $property = Property::find(decrypt($id));
        $register_properties = PropertyManager::withoutTrash()->where('added_by',Auth::guard('web')->user()->id)->get();
        $projects = Project::where('user_id',Auth::guard('web')->user()->id)->get();

        $plan_purchases = PlanPurchase::where('user_id',Auth::guard('web')->user()->id)->where('expiry_at', '>=', Carbon::now())->withcount('property')->get();
        $times = 0;
        if($register_properties->count() >= 1){
            $times = $register_properties->count();
            if($plan_purchases->count() != 0){
                return view('frontend.user.property.edit',compact('times','plan_purchases','projects','property'));
            }else{
                return redirect()->route('plan');
            }
        }else{
            $times = 0;
            return view('frontend.user.property.edit',compact('times','plan_purchases','projects','property'));
        }
    }

    public function update(Request $request,$id){
        $property=Property::find(decrypt($id));
        $property->name=$request->name;
        $property->properties_type=$request->properties_type;
        $property->property_selling_type=$request->property_selling_type;
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
        if(is_array($request->gallery_image)){
            $property->photos=implode(",",$request->gallery_image);
        }else{
            $property->photos='';
        }
        $property->amenities=json_encode($request->amenity);

        $property->thumbnail_img=$request->image;
        if($request->offer){
            $property->offer = $request->offer_text;
        }else{
            $property->offer = null;
        }
        $property->remark=$request->remark;
        $property->meta_title = $property->meta_title??$request->name;
        $property->save();

        return redirect()->route('user.property.index')->with('success','Property Updated Successfully!');
    }

    public function status($id,$status){
        $property = Property::find($id);
        $property->is_status = $status;
        $property->save();

        return back()->with('success','Property Updated Successfully!');
    }

    public function propertyInstallment(Request $request,$booking_id){
        $search_date = $request->search_date;

        $property = BookProperty::where('id',decrypt($booking_id))->with(['property','user'])->first();
        $installments = Installment::where('booking_id',decrypt($booking_id))->with('commissions.user')->latest()->get();

        return view('frontend.user.property.installment',compact('property','installments','search_date'),['page_title'=>'Installment List']);
    }

}
