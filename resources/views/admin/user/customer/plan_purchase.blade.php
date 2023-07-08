@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">@isset($page_title) {{$page_title}} @endisset</li>
                        </ol>
                    </div>
                    <div class="col-sm-6 text-right">
                        <b>Name: </b>{{$user->name}} <br>
                        <b>Phone: </b>{{$user->phone}} <br>
                        <b>Email: </b>{{$user->email}}
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary">
                            <div class="card-body table-responsive p-2" id="table">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Plan Detail</th>
                                            <th class="text-center">No. of Property</th>
                                            <th class="text-center">Left Days</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Payment Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($plan_purchases as $key=>$plan_purchase)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($plan_purchases->currentPage() - 1)*$plan_purchases->perPage()}}</td>
                                                <td>
                                                    <b>Name: </b>{{$plan_purchase->plan->name}} <br>
                                                    <b>Duration (in days): </b> {{$plan_purchase->duration_in_day}}
                                                </td>
                                                <td class="text-center">{{$plan_purchase->number_of_property}}</td>
                                                <td class="text-center">
                                                    @php
                                                        $current_date = \Carbon\Carbon::now()->startOfDay();
                                                        $expiry_date = $plan_purchase->created_at->addDay($plan_purchase->duration_in_day);
                                                    @endphp
                                                    {{$current_date->diff($expiry_date)->format('%a')}}
                                                </td>
                                                <td class="text-center">
                                                    <del>₹{{$plan_purchase->price}}</del> ₹{{$plan_purchase->discounted_price}}
                                                </td>
                                                <td>
                                                    <b>ID: </b>{{json_decode($plan_purchase->payment_detail)->id}} <br>
                                                    <b>Date: </b>{{$plan_purchase->created_at}}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="footable-empty">
                                                <td colspan="11">
                                                    <center style="padding: 70px;"><i class="far fa-frown" style="font-size: 100px;"></i><br>
                                                        <h2>Nothing Found</h2>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><b>Showing {{($plan_purchases->currentpage()-1)*$plan_purchases->perpage()+1}} to {{(($plan_purchases->currentpage()-1)*$plan_purchases->perpage())+$plan_purchases->count()}} of {{$plan_purchases->total()}} Plan Purchases</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $plan_purchases->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
