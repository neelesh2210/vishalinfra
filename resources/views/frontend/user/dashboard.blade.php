@extends('frontend.layouts.app')
@section('content')
    <section class="gray pt-5 pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    @include('frontend.include.sidebar')
                </div>
                @php
                    $today_earning = App\Models\Admin\Commission::where('is_confirm','1')->where('user_id',Auth::guard('web')->user()->id)->whereDate('created_at', Carbon\Carbon::today())->sum('commission_amount');
                    $last_7_day_earning = App\Models\Admin\Commission::where('is_confirm','1')->where('user_id',Auth::guard('web')->user()->id)->whereDate('created_at', '>=', Carbon\Carbon::now()->subDays(7))->sum('commission_amount');
                    $last_30_day_earning = App\Models\Admin\Commission::where('is_confirm','1')->where('user_id',Auth::guard('web')->user()->id)->whereDate('created_at', '>=', Carbon\Carbon::now()->subDays(30))->sum('commission_amount');
                    $all_time_earning = App\Models\Admin\Commission::where('is_confirm','1')->where('user_id',Auth::guard('web')->user()->id)->sum('commission_amount');

                    $charges = App\Models\Admin\Charge::all();
                    if(isset($charges[0])){
                        $service_charge = $charges[0]->amount;
                    }else{
                        $service_charge = 0;
                    }
                    if(isset($charges[1])){
                        $tds_charge = $charges[1]->amount;
                    }else{
                        $tds_charge = 0;
                    }
                    $service_amount = (Auth::guard('web')->user()->commission_balance*$service_charge)/100;
                    $tds_amount = ((Auth::guard('web')->user()->commission_balance - $service_amount)*$tds_charge)/100;
                    $pending_payout = Auth::guard('web')->user()->commission_balance - $service_amount - $tds_amount;
                    $total_book_property = App\Models\BookProperty::where('booked_by',Auth::guard('web')->user()->id)->count();
                    $total_collection = App\Models\Installment::whereHas('booking',function($query){
                        $query->where('booked_by',Auth::guard('web')->user()->id);
                    })->sum('final_amount');
                @endphp
                <div class="col-lg-9 col-md-8">
                    <div class="dashboard-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-1 gradient-45deg-light-blue-cyan ">
                                    <img src="{{ asset('frontend/assets/img/circle.svg')}}" alt="New Matching Leads">
                                    <div class="dashboard_stats_wrap_content"><h4>{{App\Models\Admin\Property::where('added_by',Auth::guard('web')->user()->id)->get()->count()}}</h4> <span>Total Property</span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-3 gradient-45deg-red-pink">
                                    <img src="{{ asset('frontend/assets/img/circle.svg')}}" alt="New Matching Leads">
                                    <div class="dashboard_stats_wrap_content"><h4>{{App\Models\Admin\Property::where('added_by',Auth::guard('web')->user()->id)->where('is_status','1')->get()->count()}}</h4> <span>Approved Property</span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-2 gradient-45deg-amber-amber">
                                    <img src="{{ asset('frontend/assets/img/circle.svg')}}" alt="New Matching Leads">
                                    <div class="dashboard_stats_wrap_content"><h4>{{App\Models\Enquiry::whereHas('property',function($q){
                                        $q->where('added_by',Auth::guard('web')->user()->id);
                                    })->get()->count()}}</h4> <span>Total Leads</span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-4 gradient-45deg-green-teal">
                                    <img src="{{ asset('frontend/assets/img/circle.svg')}}" alt="New Matching Leads">
                                    <div class="dashboard_stats_wrap_content"><h4>{{App\Models\Enquiry::whereHas('property',function($q){
                                        $q->where('added_by',Auth::guard('web')->user()->id);
                                    })->get()->count()}}</h4> Consumed Leads<span></span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-4 gradient-45deg-green-teal">
                                    <img src="{{ asset('frontend/assets/img/circle.svg')}}" alt="New Matching Leads">
                                    <div class="dashboard_stats_wrap_content"><h4>{{$today_earning}}</h4> Today Earning<span></span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-4 gradient-45deg-green-teal">
                                    <img src="{{ asset('frontend/assets/img/circle.svg')}}" alt="New Matching Leads">
                                    <div class="dashboard_stats_wrap_content"><h4>{{$last_7_day_earning}}</h4> Last 7 Days Earning<span></span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-4 gradient-45deg-green-teal">
                                    <img src="{{ asset('frontend/assets/img/circle.svg')}}" alt="New Matching Leads">
                                    <div class="dashboard_stats_wrap_content"><h4>{{$last_30_day_earning}}</h4> Last 30 Days Earning<span></span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-4 gradient-45deg-green-teal">
                                    <img src="{{ asset('frontend/assets/img/circle.svg')}}" alt="New Matching Leads">
                                    <div class="dashboard_stats_wrap_content"><h4>{{$all_time_earning}}</h4> All Time Earning<span></span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-4 gradient-45deg-green-teal">
                                    <img src="{{ asset('frontend/assets/img/circle.svg')}}" alt="New Matching Leads">
                                    <div class="dashboard_stats_wrap_content"><h4>{{round($pending_payout)}}</h4>Pending Payout<span></span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-4 gradient-45deg-green-teal">
                                    <img src="{{ asset('frontend/assets/img/circle.svg')}}" alt="New Matching Leads">
                                    <div class="dashboard_stats_wrap_content"><h4>{{Auth::guard('web')->user()->userProfile->level}} ({{Auth::guard('web')->user()?->userProfile?->levelPercent?->percent}} %)</h4>Level<span></span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-4 gradient-45deg-green-teal">
                                    <img src="{{ asset('frontend/assets/img/circle.svg')}}" alt="New Matching Leads">
                                    <div class="dashboard_stats_wrap_content"><h4>{{$total_book_property}}</h4>Total Book Property<span></span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-4 gradient-45deg-green-teal">
                                    <img src="{{ asset('frontend/assets/img/circle.svg')}}" alt="New Matching Leads">
                                    <div class="dashboard_stats_wrap_content"><h4>{{$total_collection}}</h4>Total Collection<span></span></div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="mb-0">Extra Area Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-inline text-center m-t-40">
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5 text-warning"></i>Website A</h5>
                                            </li>
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5 text-danger"></i>Website B</h5>
                                            </li>
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5 text-success"></i>Website C</h5>
                                            </li>
                                        </ul>
                                        <div class="chart" id="extra-area-chart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Notifications</h6>
                                    </div>
                                    <div class="ground-list ground-list-hove">
                                        <div class="ground ground-single-list">
                                            <a href="#">
                                                <div class="btn-circle-40 theme-cl theme-bg-light"><i class="ti-home"></i></div>
                                            </a>
                                            <div class="ground-content">
                                                <h6><a href="#">Your listing <strong>Azreal Modern</strong> has been approved!.</a></h6>
                                                <span class="small">Just Now</span>
                                            </div>
                                        </div>
                                        <div class="ground ground-single-list">
                                            <a href="#">
                                                <div class="btn-circle-40 theme-cl theme-bg-light"><i class="ti-comment-alt"></i></div>
                                            </a>
                                            <div class="ground-content">
                                                <h6><a href="#">Litha Lynes left a review on <strong>Renovated Apartment</strong></a></h6>
                                                <span class="small">20 min ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
        <div class="modal-dialog modal-xl login-pop-form" role="document">
            <div class="modal-content overli" id="registermodal">
                <div class="modal-body p-0">
                    <div class="resp_log_wrap">
                        <div class="resp_log_thumb" style="background:url({{ asset('frontend/assets/img/log.jpg')}})no-repeat;"></div>
                        <div class="resp_log_caption">
                            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                            <div class="edlio_152">
                                <ul class="nav nav-pills tabs_system center" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                    <a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false"><i class="fas fa-user-plus mr-2"></i>Register</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                                    <div class="login-form">
                                        <form>
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <div class="input-with-icon">
                                                    <input type="text" class="form-control">
                                                    <i class="ti-user"></i>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <div class="input-with-icon">
                                                    <input type="password" class="form-control">
                                                    <i class="ti-unlock"></i>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="eltio_ol9">
                                                    <div class="eltio_k1">
                                                        <input id="dd" class="checkbox-custom" name="dd" type="checkbox">
                                                        <label for="dd" class="checkbox-custom-label">Remember Me</label>
                                                    </div>
                                                    <div class="eltio_k2">
                                                        <a href="#">Lost Your Password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
                                    <div class="login-form">
                                        <form>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <div class="input-with-icon">
                                                    <input type="text" class="form-control">
                                                    <i class="ti-user"></i>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Email ID</label>
                                                <div class="input-with-icon">
                                                    <input type="email" class="form-control">
                                                    <i class="ti-user"></i>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <div class="input-with-icon">
                                                    <input type="password" class="form-control">
                                                    <i class="ti-unlock"></i>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="eltio_ol9">
                                                    <div class="eltio_k1">
                                                        <input id="dds" class="checkbox-custom" name="dds" type="checkbox">
                                                        <label for="dds" class="checkbox-custom-label">By using the website, you accept the terms and conditions</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-md full-width pop-login">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

    <script src="{{ asset('frontend/assets/js/raphael.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/morris.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/morris.js')}}"></script>

@endsection
