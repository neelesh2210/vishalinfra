@extends('frontend.user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-3 mb-2">
                                <div class="card widget-flat gradient-45deg-light-blue-cyan" data-aos="fade-left" data-aos-duration="500" data-aos-once="true">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">0</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Customers">Today's Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <div class="card widget-flat gradient-45deg-red-pink">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">0</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Orders">Last 7 Days Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <div class="card widget-flat statistic-bg-purple">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">0</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Orders">Last 30 Days Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <div class="card widget-flat gradient-45deg-green-teal">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">0</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Orders">All Time Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <div class="card widget-flat gradient-45deg-amber-amber">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">0</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Orders">Passive Income</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <div class="card widget-flat bg-gradient-moonlit">
                                    <div class="card-body">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">0</span></h3>
                                        <h5 class="text-white fw-normal mt-3" title="Number of Customers">Pending Amount</h5>
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
