@extends('frontend.user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Property Detail</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3 text-uppercase bg-light p-2">Property Information</h5>
                            <hr>
                            <form action="{{route('user.property.book')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="property_number" class="form-label">Property Number</label>
                                        <input type="text" id="property_number" class="form-control" name="property_number" value="{{$property->property_number}}" placeholder="Property Number..." readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="property_name" class="form-label">Property Name</label>
                                        <input type="text" id="property_name" class="form-control" value="{{$property->name}}" placeholder="Property Name..." readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="property_type" class="form-label">Property Type</label>
                                        <input type="text" id="property_type" class="form-control" value="{{ucwords(str_replace('_',' ',$property->properties_type))}}" placeholder="Property Type..." readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="token_amount" class="form-label">Token Amount</label>
                                        <input type="text" id="token_amount" class="form-control" name="token_amount" value="{{$property->token_money}}" placeholder="Token Amount..." readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="customer_id" class="form-label">Customer</label>
                                        <select name="user_id" id="user_id" class="form-control" data-toggle="select2" required>
                                            <option value="">Select User...</option>
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}} ({{$user->phone}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="customer_id" class="form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <a href="{{route('user.customer.index')}}?user_type=customer" class="btn btn-primary"><i class="uil-plus"></i> Add Customer</a>
                                    </div>
                                    <div class="col-md-3 mb-3 text-center">
                                        <label for="wallet" class="form-label">Wallet</label> <br>
                                        <input type="radio" id="wallet" name="pay_from" value="wallet" class="form-check-input" checked>
                                    </div>
                                    <div class="col-md-3 mb-3 text-center">
                                        <label for="online_pay" class="form-label">Pay Online</label> <br>
                                        <input type="radio" id="online_pay" name="pay_from" value="online" class="form-check-input">
                                    </div>
                                    <div class="col-md-12 mb-3 text-center">
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
