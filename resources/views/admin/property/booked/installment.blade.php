@extends('admin.layouts.app')
@section('content')
    <style>
        .input-group-sm>.form-control:not(textarea) {
            height: 35px;
        }
        .input-group-sm>.form-control{
            border-radius: 0;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 20px;
        }
        .select2-container--default .select2-selection--single {
            display: block;
            width: 100%;
            padding: 0.6rem 1rem;
            border-radius: 0;
            font-size: 1rem;
            height: 35px;
            /* line-height: 35px; */
            border: 1px solid #e2e5ec;
            color: #898b92;
        }
    </style>
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
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
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
                                            <th class="text-center">Commission</th>
                                            <th class="text-center">Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($installments as $key=>$installment)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td class="text-center">{{$installment->created_at}}</td>
                                                <td class="text-center">₹ {{$installment->amount}}</td>
                                                <td class="text-center">
                                                    <table>
                                                        @foreach ($installment->commissions as $commission)
                                                            <tr>
                                                                <td>
                                                                    {{$commission->user->name}}
                                                                </td>
                                                                <td>
                                                                    L-{{$commission->level}}
                                                                </td>
                                                                <td>
                                                                    {{$commission->percentage}}%
                                                                </td>
                                                                <td>
                                                                    ₹ {{$commission->commission_amount}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('admin.property.installment.invoice',$installment->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                                                        <i class="fas fa-print"></i>
                                                    </a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
