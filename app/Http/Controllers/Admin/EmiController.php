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
use App\Models\Admin\PropertyEmi;
use App\Models\Admin\LevelPercent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CustomerCommissionController;
use App\Http\Controllers\Admin\AssociateCommissionController;

class EmiController extends Controller
{

    public function convertToEmi($book_property_id){
        $property = BookProperty::with(['property'])->withSum('installments','amount')->where('booking_status','!=','available')->where('id',decrypt($book_property_id))->first();

        return view('admin.property.emi.index',compact('property'),['page_title'=>'Convert to EMI']);
    }

    public function convertToEmiStore(Request $request,$book_property_id){
        $property = BookProperty::with(['property'])->withSum('installments','amount')->where('booking_status','!=','available')->where('id',decrypt($book_property_id))->first();
        $property->emi_charge = $request->emi_charge;
        $property->booking_status = 'emi';
        $property->save();

        for ($i=1; $i <= $request->emi_month; $i++) {
            $property_emi = new PropertyEmi;
            $property_emi->booking_id = $property->id;
            $property_emi->emi_date = Carbon::now()->addMonth($i)->startOfMonth()->format('Y-m-d');
            $emi_amount = (($property->property->final_price - $property->installments_sum_amount)+$request->emi_charge)/$request->emi_month;
            $property_emi->emi_amount = $emi_amount;
            $property_emi->final_amount = $emi_amount;
            $property_emi->due_amount = $emi_amount;
            $property_emi->save();
        }

        return redirect()->route('admin.booked.property.index')->with('success','Installment converted into EMI!');
    }

    public function emiPropertyList(Request $request){
        $search_project = $request->search_project;
        $search_date = $request->search_date;
        $search_key = $request->search_key;

        $booked_properties = BookProperty::with(['property','property.project','property'])->withSum('installments','amount')->withSum('commissions','commission_amount')->where('booking_status','emi')->orderby('created_at','desc');

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
            return view('admin.property.emi.list_data',compact('booked_properties','search_key','search_project','search_date'));
        }

        return view('admin.property.emi.list',compact('booked_properties','search_key','search_project','search_date'),['page_title'=>'EMI Property']);
    }

    public function PropertyEmi($booking_id){
        $book_property = BookProperty::with(['property'])->withSum('installments','amount')->where('booking_status','emi')->where('id',decrypt($booking_id))->first();
        $property_emis = PropertyEmi::where('booking_id',$book_property->id)->with('installment')->get();

        return view('admin.property.emi.emi_installment',compact('book_property','property_emis'),['page_title'=>'Property EMI']);
    }

    public function calculateEmi(Request $request){
        $property_emi_ids = PropertyEmi::where('booking_id',$request->booking_id)->where('paid_status','0')->oldest('id')->take(count($request->emi_ids??[]))->pluck('id')->toArray();
        if($request->emi_ids){
            if($property_emi_ids != $request->emi_ids){
                return response()->json(['message'=>'You have Select Wrong Emi!'],422);
            }
        }
        $property_emis = PropertyEmi::where('booking_id',$request->booking_id)->where('paid_status','0')->oldest('id')->whereIn('id',$request->emi_ids??[]);
        $total_emi_amount = $property_emis->sum('due_amount');
        $number_of_emi = $property_emis->count();

        $booking_id = $request->booking_id;
        $emi_ids = $request->emi_ids??[];
        $property_emis = $property_emis->get();

        return response()->json(['view'=>view('admin.property.emi.emi_detail',compact('total_emi_amount','number_of_emi','booking_id','emi_ids','property_emis'))->render()]);
    }

    public function finalEmi(Request $request){
        $request->validate([
            'paid_amount'=>'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        //return $request->all();

        $book_property = BookProperty::find($request->booking_id);
        $property = Property::find($book_property->property_id);

        $property_due_amount = PropertyEmi::where('paid_status','0')->where('status','pending')->where('booking_id',$book_property->id)->whereIn('id',json_decode($request->emi_ids))->sum('due_amount');
        $property_emis = PropertyEmi::where('paid_status','0')->where('status','pending')->where('booking_id',$request->booking_id)->whereIn('id',json_decode($request->emi_ids))->get();

        if(count($property_emis) > 0) {
            $total_discount = array_sum($request->discount) + $request->extra_discount;
            if($request->paid_amount <= $property_due_amount){
                $installment = new Installment;
                $installment->booking_id = $book_property->id;
                $installment->amount = $request->paid_amount;
                $installment->discount_amount = $total_discount;
                $installment->final_amount = $request->paid_amount;
                $installment->taken_by = Auth::guard('admin')->user()->id;
                $installment->taken_by_type = 'admin';
                $installment->reference_id = $request->refrence_number;
                $installment->payment_date = $request->payment_date;
                $installment->remark = $request->remark;
                $installment->save();

                // if($book_property->booked_type == 'associate'){
                //     $book_prperty_controller = new AssociateCommissionController;
                //     $book_prperty_controller->commissionDistribution($book_property->booked_by,$property->id,$installment->final_amount,$installment->id,$installment->final_amount);
                // }
                // if($book_property->booked_type == 'customer'){
                //     $customer_commission_controller = new CustomerCommissionController;
                //     $customer_commission_controller->customerCommissionDistribution($book_property->booked_by,$property->id,$installment->final_amount,$installment->id,$installment->final_amount);
                // }
                $total_amount = Installment::where('booking_id',$book_property->id)->get()->sum('amount');

                $total_paying_amount = $total_amount + $installment->final_amount;

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
                                                $book_property->booked_by,                      //Associate ID
                                                $property->id,                                  //Property ID
                                                $installment->final_amount,                     //Paid Amount
                                                $installment->id,                               //Installment ID
                                                $commission_show                                //Commission Confirmation
                                            );
                }

                $paid_amount = $request->paid_amount;

                foreach ($property_emis as $key => $property_emi) {
                    $emi = PropertyEmi::where('id',$property_emi->id)->first();
                    $emi->discount_amount = $emi->discount_amount + $request->discount[$key];
                    $fianl_amount = $emi->final_amount - $request->discount[$key];
                    $emi->final_amount = $fianl_amount;

                    if(($emi->due_amount - $request->discount[$key]) <= $paid_amount){
                        $due_amount = 0;
                        $paid_amount = $paid_amount - ($emi->due_amount - $request->discount[$key]);
                    }elseif(($emi->due_amount - $request->discount[$key]) > $paid_amount){
                        $due_amount = ($emi->due_amount - $request->discount[$key]) - $paid_amount;
                        $paid_amount = 0;
                    }
                    $emi->due_amount = $due_amount;
                    if($due_amount == 0){
                        $emi->paid_status = '1';
                        $emi->status = 'success';
                    }

                    // if($emi->due_amount == 0.00){
                    //     if($paid_amount >= $fianl_amount){
                    //         $pay = $paid_amount - $fianl_amount ;
                    //     }else{
                    //         $pay = 0;
                    //     }
                    //     if($pay <= 0){
                    //         $emi->due_amount = $emi->final_amount - $paid_amount;
                    //     }else{
                    //         $emi->due_amount = 0.00;
                    //         $emi->paid_status = '1';
                    //         $emi->status = 'success';
                    //     }
                    // }else{
                    //     if($paid_amount >= $emi->due_amount){
                    //         $pay = $paid_amount - $emi->due_amount ;
                    //     }else{
                    //         $pay = 0;
                    //     }
                    //     if($pay <= 0){
                    //         $emi->due_amount = $emi->due_amount - $paid_amount;
                    //     }else{
                    //         $emi->due_amount = 0.00;
                    //         $emi->paid_status = '1';
                    //         $emi->status = 'success';
                    //     }
                    // }
                    $emi->save();
                }

                return redirect()->route('admin.emi.property.list')->with('success','EMI Amount Received Successfully!');
            }else{
                return back()->with('error','Not more then Final Amount!');
            }
        }else{
            return back()->with('error','EMI not found!');
        }

        return view('admin.property.emi.final_emi',compact('property','property_emis','emi_ids'),['page_title'=>'Final Emi']);
    }

    // public function finalEmiStore(Request $request){
    //     $book_property = BookProperty::find(decrypt($request->booking_id));
    //     $property = PropertyManager::withoutTrash()->where('id',$book_property->property_id)->first();
    //     $total_amount = Installment::where('booking_id',decrypt($request->booking_id))->get()->sum('amount');

    //     $property_emi_amount = PropertyEmi::where('booking_id',decrypt($request->booking_id))->where('paid_status','0')->whereIn('id',decrypt($request->emi_ids))->with('installment')->sum('emi_amount');
    //     $property_emis = PropertyEmi::where('booking_id',decrypt($request->booking_id))->where('paid_status','0')->whereIn('id',decrypt($request->emi_ids))->with('installment')->get();

    //     if(count($property_emis) != 0) {
    //         if($property->final_price - $total_amount >= $property_emi_amount){

    //             $installment = new Installment;
    //             $installment->booking_id = $book_property->id;
    //             $installment->amount_type = 'emi';
    //             $installment->amount = $property_emi_amount;
    //             $installment->final_amount = $property_emi_amount;
    //             $installment->taken_by = Auth::guard('admin')->user()->id;
    //             $installment->taken_by_type = 'admin';
    //             $installment->payment_type = $request->payment_type;
    //             $installment->save();

    //             if($book_property->booked_type == 'associate'){
    //                 $book_prperty_controller = new AssociateCommissionController;
    //                 $book_prperty_controller->commissionDistribution($book_property->booked_by,$property->id,$property_emi_amount,$installment->id,$property_emi_amount);
    //             }
    //             if($book_property->booked_type == 'customer'){
    //                 $customer_commission_controller = new CustomerCommissionController;
    //                 $customer_commission_controller->customerCommissionDistribution($book_property->booked_by,$property->id,$property_emi_amount,$installment->id,$property_emi_amount);
    //             }

    //             foreach ($property_emis as $key => $property_emi) {
    //                 $emi = PropertyEmi::where('id',$property_emi->id)->first();
    //                 $emi->installment_id = $installment->id;
    //                 $emi->paid_status = '1';
    //                 $emi->save();
    //             }

    //             return redirect()->route('admin.emi.property.list')->with('success','EMI Amount Received Successfully!');
    //         }else{
    //             return back()->with('error','Not more then Final Amount!');
    //         }
    //     }else{
    //         return back()->with('error','EMI not found!');
    //     }
    // }

    public function commissionDistribution($associate_id,$property_id,$amount,$installment,$commission_show){
        $property = Property::where('is_delete','0')->where('is_status','1')->where('id',$property_id)->first();

        $ration_percent = ($property->commission_amount / $property->final_price) * 100;

        $ration_percent = round($ration_percent,2);

        $token_amount_percent = ($amount / 100) * $ration_percent;

        $user = User::where('id',$associate_id)->with(['userProfile'])->first();

        $level = LevelPercent::where('level',$user->userProfile->level ?? 0)->first();

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
            $this->associateCommissionDistribution  ($user->sponsor_code,                  //User Referral Code
                                                        $user->userProfile->level ?? 0,          //User Level
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
                                                                    $associate?->userProfile?->level ?? 0,      //Referral Code
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
                        $this->associateCommissionDistribution($associate->sponsor_code,                //Associate Level
                                                                    $associate?->userProfile?->level ?? 0,      //Referral Code
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
            }
        }else{
            return ;
        }
    }

}
