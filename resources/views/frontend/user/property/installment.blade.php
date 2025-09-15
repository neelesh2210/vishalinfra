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
                    <div class="col-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <form id="search_form">
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <h3>Customer Detail</h3>
                                            <b>Name: </b> {{$property->customer_name}}<br>
                                            <b>Phone: </b> {{$property->customer_phone}}
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <h3>Property Detail</h3>
                                            <b>Name: </b> {{$property->property->name}}<br>
                                            <b>Plot Number: </b> {{$property->property->property_number}}<br>
                                            <b>Plot Area: </b> {{$property->property->plot_area}}<br>
                                            <b>Plot Price: </b> {{$property->property->final_price}}<br>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label>Date</label>
                                            <div class="input-group input-group-sm mr-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="search_date" value="{{$search_date}}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body table-responsive p-2" id="table">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($installments as $key=>$installment)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td class="text-center">{{$installment->created_at}}</td>
                                                <td class="text-center">₹ {{$installment->amount}}</td>
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
