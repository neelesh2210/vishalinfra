@extends('frontend.user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row mt-3 mb-3">
                    <div class="col-lg-3">
                        <div class="left-side-menu text-center users">
                            <div class="user-box text-center mb-2">
                                <img src="{{asset('user_dashboard/images/users/avatar-1.jpg')}}" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" class="rounded-circle shadow-sm">
                            </div>
                            <p class="leftbar-user-name">
                                Shailesh Gupta</p>
                            <div class="text-center">
                                <p class="text-center fw-bolder mr-2 text-light">Edit Profile
                                    <a href="{{route('user.profile')}}" class="btn btn-success pb"><i class="uil uil-edit" style="font-size:15px;"></i></a>
                                </p>
                            </div>
                            <p class="text-light mb-0"><i class="uil-phome"></i>
                                +91-1234567890</p>
                            <p class="text-light mb-0"><i class="uil-envelope-open"></i>
                                shivamonit@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row user-earning justify-content-center">
                            <div class="col-sm-4">
                                <div class="card widget-flat gradient-45deg-light-blue-cyan" data-aos="fade-left" data-aos-duration="500" data-aos-once="true">
                                    <div class="card-body text">
                                        <img src="{{asset('user_dashboard/images/circle.svg')}}" alt="Total Properties">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">0</span></h3>
                                        <h5 class="text-white" title="Number of Customers">Total Properties
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="card widget-flat gradient-45deg-red-pink">
                                    <div class="card-body">
                                        <img src="{{asset('user_dashboard/images/circle.svg')}}" alt="Last 7 Days Leads">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">0</span></h3>
                                        <h5 class="text-white" title="Number of Orders">Last 7 Days Leads</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="card widget-flat statistic-bg-purple">
                                    <div class="card-body">
                                        <img src="{{asset('user_dashboard/images/circle.svg')}}" alt="Last 30 Days Leads">
                                        <h3 class="text-white"><small>₹</small>
                                            <span class="counter-value">0</span></h3>
                                        <h5 class="text-white" title="Number of Orders">Last 30 Days Leads
                                        </h5>
                                    </div>
                                </div>
                            </div>



                            <div class="col-sm-4 col-xs-6">
                                <div class="card widget-flat gradient-45deg-amber-amber">
                                    <div class="card-body">
                                        <img src="{{asset('user_dashboard/images/circle.svg')}}" alt="Balance">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">0</span></h3>
                                        <h5 class="text-white" title="Number of Orders">Balance</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-xs-6">
                                <div class="card widget-flat bg-gradient-moonlit">
                                    <div class="card-body">
                                        <img src="{{asset('user_dashboard/images/circle.svg')}}" alt="Passive Income">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">0</span></h3>
                                        <h5 class="text-white" title="Number of Orders">Last Month Earn</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-xs-12">
                                <div class="card widget-flat gradient-45deg-green-teal">
                                    <div class="card-body text">
                                        <img src="{{asset('user_dashboard/images/circle.svg')}}" alt="All Time Earnin">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">0</span>
                                        </h3>
                                        <h5 class="text-white" title="Number of Orders">All Time Earning</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
