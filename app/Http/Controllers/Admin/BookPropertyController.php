<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Installment;
use App\CPU\PropertyManager;
use App\Models\Admin\Charge;
use App\Models\BookProperty;
use Illuminate\Http\Request;
use App\Models\Admin\Property;
use App\Models\Admin\Commission;
use App\Models\Admin\LevelPercent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CustomerCommissionController;
use App\Http\Controllers\Admin\AssociateCommissionController;

class BookPropertyController extends Controller
{

    public function reservedPropertyIndex(Request $request){
        $search_project = $request->search_project;
        $search_date = $request->search_date;
        $search_key = $request->search_key;

        $booked_properties = BookProperty::with(['property','property.project','property','user'])->where('booking_status','token')->orderby('created_at','desc');

        if($search_project){
            $booked_properties = $booked_properties->whereHas('property',function($q) use ($search_project){$q->where('project_id',$search_project);});
        }
        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $booked_properties = $booked_properties->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_key){
            $booked_properties = $booked_properties->whereHas('user',function($q) use ($search_key){
                $q->where(function ($query) use ($search_key){
                    $query->where('name','LIKE','%'.$search_key.'%')
                          ->orWhere('phone',$search_key)
                          ->orWhere('email',$search_key)
                          ->orWhere('referrer_code',$search_key);
                });
            });
        }

        $booked_properties = $booked_properties->paginate(15);

        if($request->ajax()){
            return view('admin.property.reserved.table',compact('booked_properties','search_key','search_project','search_date'));
        }
        return view('admin.property.reserved.index',compact('booked_properties','search_key','search_project','search_date'),['page_title'=>'Reserved Property']);
    }

    public function reservedPropertyDetail($booking_id){
        $property = BookProperty::where('id',decrypt($booking_id))->with(['property','property.project','property.phase'])->first();

        return view('admin.property.reserved.detail',compact('property','booking_id'),['page_title'=>'Reserved Property Detail']);
    }

    public function reservedPropertyStore(Request $request){
        $book_property = BookProperty::find(decrypt($request->booking_id));
        $book_property->booking_status = 'booked';
        $book_property->save();

        $poperty = PropertyManager::withoutTrash()->where('id',$book_property->property_id)->first();

        $installment = new Installment;
        $installment->booking_id = $book_property->id;
        $installment->amount_type = 'booking_amount';
        $installment->amount = $poperty->booking_amount;
        $installment->final_amount = $poperty->booking_amount;
        $installment->taken_by = Auth::guard('admin')->user()->id;
        $installment->taken_by_type = 'admin';
        $installment->payment_type = $request->payment_type;
        $installment->save();

        $poperty->booking_status = 'booked';
        $poperty->save();

        if($book_property->booked_type == 'associate'){
            $book_prperty_controller = new AssociateCommissionController;
            $book_prperty_controller->commissionDistribution($book_property->booked_by,$poperty->id,$poperty->booking_amount,$installment->id,$poperty->booking_amount);
        }
        if($book_property->booked_type == 'customer'){
            $customer_commission_controller = new CustomerCommissionController;
            $customer_commission_controller->customerCommissionDistribution($book_property->booked_by,$poperty->id,$poperty->booking_amount,$installment->id,$poperty->booking_amount);
        }

        return redirect()->route('admin.reserved.property.index')->with('success','Booking Amount Received Successfully!');
    }

    public function bookedPropertyIndex(Request $request){
        $search_project = $request->search_project;
        $search_date = $request->search_date;
        $search_key = $request->search_key;

        $booked_properties = BookProperty::with(['property','property.project','property','associate'])->withSum('installments','amount')->withSum('commissions', 'commission_amount')->whereNotIN('booking_status',['available','emi','sold','refunded'])->orderby('created_at','desc');

        if($search_project){
            $booked_properties = $booked_properties->whereHas('property',function($q) use ($search_project){$q->where('project_id',$search_project);});
        }
        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $booked_properties = $booked_properties->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_key){
            $booked_properties = $booked_properties->whereHas('user',function($q) use ($search_key){
                $q->where(function ($query) use ($search_key){
                    $query->where('name','LIKE','%'.$search_key.'%')
                          ->orWhere('phone',$search_key)
                          ->orWhere('email',$search_key)
                          ->orWhere('referrer_code',$search_key);
                });
            });
        }

        $booked_properties = $booked_properties->paginate(15);
        if($request->ajax()){
            return view('admin.property.booked.table',compact('booked_properties','search_key','search_project','search_date'));
        }

        return view('admin.property.booked.index',compact('booked_properties','search_key','search_project','search_date'),['page_title'=>'Booked Property']);
    }

    public function bookedPropertyDetail($booking_id){
        $property = BookProperty::where('id',decrypt($booking_id))->with(['property','property.project','property'])->withSum('installments','amount')->first();

        return view('admin.property.booked.detail',compact('property','booking_id'),['page_title'=>'Booked Property Detail']);
    }

    public function bookedPropertyStore(Request $request){
        $request->validate([
            'installment_amount'=>'required|numeric'
        ]);

        $book_property = BookProperty::find(decrypt($request->booking_id));
        $property = Property::where('is_delete','0')->where('is_status','1')->where('id',$book_property->property_id)->first();
        if($property){
            $total_amount = Installment::where('booking_id',decrypt($request->booking_id))->get()->sum('amount');

            if(($property->final_price - $total_amount) >= $request->installment_amount){
                $associate = User::where('id',$book_property->booked_by)->first();

                $total_paying_amount = $total_amount + $request->installment_amount;

                $booking_status = 'on_hold';

                if($total_paying_amount >= $property->token_money){
                    $booking_status = 'reserved';
                }
                if($total_paying_amount >= $property->booking_amount){
                    $booking_status = 'booked';
                }
                if($total_paying_amount >= $property->registry_amount){
                    $booking_status = 'registred';
                }
                if($total_paying_amount == $property->final_price){
                    $booking_status = 'sold';
                }

                $book_property->booking_status = $booking_status;
                $book_property->save();

                $installment = new Installment;
                $installment->booking_id = $book_property->id;
                $installment->amount = $request->installment_amount;
                $installment->final_amount = $request->installment_amount;
                $installment->taken_by = Auth::guard('admin')->user()->id;
                $installment->taken_by_type = 'admin';
                $installment->payment_date = $request->payment_date;
                $installment->payment_detail = $request->payment_type;
                $installment->save();

                Property::where('id',$property->id)->update([
                    'booking_status'=>$booking_status
                ]);

                $min_commission_amount_setting = Charge::where('type','min_commission_amount')->first();
                if($min_commission_amount_setting){
                    if($min_commission_amount_setting->amount_type == 'percent'){
                        $min_commission_amount = ($property->final_price/100)*$min_commission_amount_setting->amount;
                    }else{
                        $min_commission_amount = $min_commission_amount_setting->amount;
                    }

                    $commission_show = '0';
                    if($total_paying_amount >= $min_commission_amount){
                        $commission_show = '1';
                    }

                    $this->commissionDistribution(
                                                    $associate->id,                     //Associate ID
                                                    $property->id,                      //Property ID
                                                    $request->installment_amount,                   //Paid Amount
                                                    $installment->id,                   //Installment ID
                                                    $commission_show                    //Commission Confirmation
                                                );
                }

                return redirect()->route('admin.booked.property.index')->with('success','Installment Amount Received Successfully!');
            }else{
                return back()->with('error','Not more then Final Amount!');
            }
        }else{
            return back()->with('error','Property Not Found!');
        }
    }

    public function propertyInstallment(Request $request,$booking_id){
        $search_date = $request->search_date;

        $property = BookProperty::where('id',decrypt($booking_id))->with(['property','user'])->first();
        $installments = Installment::where('booking_id',decrypt($booking_id))->with('commissions.user')->latest()->get();

        return view('admin.property.booked.installment',compact('property','installments','search_date'),['page_title'=>'Installment List']);
    }

    public function commissionDistribution($associate_id,$property_id,$amount,$installment,$commission_show){
        $property = Property::where('is_delete','0')->where('is_status','1')->where('id',$property_id)->first();

        $ration_percent = ($property->commission_amount / $property->final_price) * 100;

        $ration_percent = round($ration_percent,2);

        $token_amount_percent = ($amount / 100) * $ration_percent;

        $user = User::where('id',$associate_id)->with(['userProfile'])->first();

        $level = LevelPercent::where('level',$user->userProfile->level)->first();

        $commission_amount = ($token_amount_percent / 100) * $level->percent;

        $installment_detail = Installment::where('id',$installment)->first();
        $all_installment_ids = Installment::where('booking_id',$installment_detail->booking_id)->pluck('id')->toArray();

        // $total_sales_amount = BookProperty::where('booked_by',$user->id)->sum('final_amount');

        $commission = new Commission;
        $commission->installment_id = $installment;
        $commission->user_id = $user->id;
        $commission->property_id = $property->id;
        $commission->commission_amount = $commission_amount;
        $commission->level = $level->level;
        $commission->percentage = $level->percent;
        $commission->commission_type = 'active';
        $commission->is_confirm = $commission_show;
        $commission->save();

        if($commission_show == '1'){
            Commission::whereIn('installment_id',$all_installment_ids)->where('is_confirm','0')->update(['is_confirm'=>'1']);
        }

        // $upgrade_amount = 0;
        // $levels = LevelPercent::all();
        // foreach ($levels as $leve) {
        //     $upgrade_amount = $upgrade_amount + $leve->amount;
        //     if($level->level+1 == $leve->level){
        //         break;
        //     }
        // }

        // if($total_sales_amount >= $upgrade_amount){
        //     UserProfile::where('user_id',$user->id)->update([
        //         'level'=>$level->level+1
        //     ]);

        //     LevelUpgradeRecord::create([
        //         'user_id'=>$user->id,
        //         'to'=>$level->level,
        //         'from'=>$level->level+1,
        //         'type'=>'auto',
        //     ]);
        // }

        if($user->sponsor_code){
            $times = 'multiple';
            $final_commission_amount = $token_amount_percent;
            $this->associateCommissionDistribution  ($user->sponsor_code,                   //User Referral Code
                                                        $user?->userProfile?->level ?? 0,   //User Level
                                                        $commission_amount,                 //Commission Amount
                                                        $property->id,                      //Property Id
                                                        $final_commission_amount,           //Final Commission Amount
                                                        $times,                             //Times
                                                        $installment,                       //installment
                                                        $commission_show
                                                    );
        }
    }

    public function associateCommissionDistribution($user_referral_code,                    //User Referral Code
                                                        $user_level,                        //User Level
                                                        $commission_amount,                 //Commission Amount
                                                        $property_id,                       //Property Id
                                                        $final_commission_amount,           //Final Commission Amount
                                                        $times,                             //Times
                                                        $installment,                       //installment
                                                        $commission_show
                                                    ){
        $associate = User::where('user_name',$user_referral_code)->with(['userProfile'])->first();
        if($associate->type == 'agent'){
            if($user_level >= $associate?->userProfile?->level ?? 0){
                $commission_amount = ($commission_amount / 100) * 10;

                $commission = new Commission;
                $commission->installment_id = $installment;
                $commission->user_id = $associate->id;
                $commission->property_id = $property_id;
                $commission->commission_amount = $commission_amount;
                $commission->level = $associate?->userProfile?->level ?? 0;
                $commission->percentage = 10;
                $commission->commission_type = 'passive';
                $commission->is_confirm = $commission_show;
                $commission->save();

                // $upgrade_amount = 0;
                // $levels = LevelPercent::all();
                // foreach ($levels as $leve) {
                //     $upgrade_amount = $upgrade_amount + $leve->amount;
                //     if($associate->userProfile->level+1 == $leve->level){
                //         break;
                //     }
                // }

                // if($associate->total_sales >= $upgrade_amount){
                //     UserProfile::where('user_id',$associate->id)->update([
                //         'level'=>$associate->userProfile->level+1
                //     ]);

                //     LevelUpgradeRecord::create([
                //         'user_id'=>$associate->id,
                //         'to'=>$associate->userProfile->level,
                //         'from'=>$associate->userProfile->level+1,
                //         'type'=>'auto',
                //     ]);
                // }

                if($times == 'multiple'){
                    if($associate->sponsor_code){
                        $final_commission_amount = $final_commission_amount;
                        $this->associateCommissionDistribution($associate->sponsor_code,                //Associate Level
                                                                    $associate->userProfile->level,      //Referral Code
                                                                    $commission_amount,                  //Commission Amount
                                                                    $property_id,                        //Commission Amount
                                                                    $final_commission_amount,            //Final Commission Amount
                                                                    $times,                              //Times
                                                                    $installment,                        //installment
                                                                    $commission_show
                                                                );
                    }
                }else{
                    return ;
                }
            }else{
                $percent_associate = LevelPercent::where('level',$associate?->userProfile?->level ?? 0)->first();
                $percent_user = LevelPercent::where('level',$user_level)->first();
                $percent = $percent_associate->percent - $percent_user->percent;
                $commission_amount = ($final_commission_amount / 100) * $percent;

                Commission::create([
                    'installment_id'=>$installment,
                    'user_id'=>$associate->id,
                    'property_id'=>$property_id,
                    'commission_amount'=>$commission_amount,
                    'level'=>$percent_associate->level,
                    'percentage'=>$percent_associate->percent,
                    'commission_type'=>'passive',
                    'is_confirm'=>$commission_show,
                ]);

                // $upgrade_amount = 0;
                // $levels = LevelPercent::all();
                // foreach ($levels as $leve) {
                //     $upgrade_amount = $upgrade_amount + $leve->amount;
                //     if($percent_associate->level+1 == $leve->level){
                //         break;
                //     }
                // }

                // if($associate->total_sales >= $upgrade_amount){
                //     UserProfile::where('user_id',$associate->id)->update([
                //         'level'=>$percent_associate->level+1
                //     ]);

                //     LevelUpgradeRecord::create([
                //         'user_id'=>$associate->id,
                //         'to'=>$percent_associate->level,
                //         'from'=>$percent_associate->level+1,
                //         'type'=>'auto',
                //     ]);
                // }

                if($times == 'multiple'){
                    if($associate->sponsor_code){
                        $final_commission_amount = $final_commission_amount;
                        $this->associateCommissionDistribution($associate->sponsor_code,                    //Associate Level
                                                                    $associate?->userProfile?->level ?? 0,  //Referral Code
                                                                    $commission_amount,                     //Commission Amount
                                                                    $property_id,                           //Commission Amount
                                                                    $final_commission_amount,               //Final Commission Amount
                                                                    $times,                                 //Times
                                                                    $installment,                           //installment
                                                                    $commission_show
                                                                );
                    }
                }else{
                    return ;
                }
            }
        }else{
            return ;
        }
    }

    public function invoice($installment_id){
        $installment = Installment::where('id',$installment_id)->with('booking.user')->first();

        return view('admin.property.booked.installment.invoice',compact('installment'),['page_title'=>'Invoice']);
    }

    public function soldPropertyIndex(Request $request){
        $search_project = $request->search_project;
        $search_date = $request->search_date;
        $search_key = $request->search_key;

        $booked_properties = BookProperty::with(['property','property.project','property','associate'])->withSum('installments','amount')->withSum('commissions', 'commission_amount')->where('booking_status','sold')->orderby('created_at','desc');

        if($search_project){
            $booked_properties = $booked_properties->whereHas('property',function($q) use ($search_project){$q->where('project_id',$search_project);});
        }
        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $booked_properties = $booked_properties->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_key){
            $booked_properties = $booked_properties->whereHas('user',function($q) use ($search_key){
                $q->where(function ($query) use ($search_key){
                    $query->where('name','LIKE','%'.$search_key.'%')
                          ->orWhere('phone',$search_key)
                          ->orWhere('email',$search_key)
                          ->orWhere('referrer_code',$search_key);
                });
            });
        }

        $booked_properties = $booked_properties->paginate(15);
        if($request->ajax()){
            return view('admin.property.sold.table',compact('booked_properties','search_key','search_project','search_date'));
        }

        return view('admin.property.sold.index',compact('booked_properties','search_key','search_project','search_date'),['page_title'=>'Booked Property']);
    }

}
