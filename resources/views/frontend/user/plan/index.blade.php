@extends('frontend.layouts.app')
@section('content')
    <section class="gray pt-5 pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    @include('frontend.include.sidebar')
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="dashboard-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="_prt_filt_dash">
                                    <div class="_prt_filt_dash_flex">
                                        <div class="foot-news-last">
                                            <h3>Subscription</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="dashboard_property">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Plan Detail</th>
                                                    <th scope="col">Payment Detail</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($subsriptions as $key=>$subsription)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>
                                                            <b>Name:</b> {{$subsription->plan->name}} <br>
                                                            <b>Number of Property:</b> {{$subsription->number_of_property}} <br>
                                                            <b>Duration (in days):</b> {{$subsription->duration_in_day}}
                                                        </td>
                                                        <td>
                                                            <b>Payment ID: </b>{{json_decode($subsription->payment_detail)->id}} <br>
                                                            <b>Price: </b>₹ {{$subsription->discounted_price}}
                                                        </td>
                                                        <td>{{$subsription->created_at}}</td>
                                                    </tr>
                                                @endforeach
                                            <tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
