@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title){{ $page_title }}@endisset
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    <form action="{{route('admin.booked.property.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="booking_id" value="{{$booking_id}}">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="property_number" class="form-label">Property Number</label>
                                                <input type="text" id="property_number" class="form-control" name="property_number" value="{{$property->property->property_number}}" placeholder="Property Number..." readonly>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="property_name" class="form-label">Property Name</label>
                                                <input type="text" id="property_name" class="form-control" value="{{$property->property->name}}" placeholder="Property Name..." readonly>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Customer</label>
                                                <input type="text" value="{{$property->customer_name}} ({{$property->customer_phone}})" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="total_paid_amount" class="form-label">Property Amount</label>
                                                <input type="text" id="total_paid_amount" class="form-control" value="{{$property->property->final_price}}" placeholder="Total Paid Amount..." readonly>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="total_paid_amount" class="form-label">Due Amount</label>
                                                <input type="text" id="total_paid_amount" class="form-control" value="{{$property->property->final_price - $property->installments_sum_amount}}" placeholder="Total Paid Amount..." readonly>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="installment_amount" class="form-label">Installment Amount</label>
                                                <input type="text" id="installment_amount" class="form-control" name="installment_amount" placeholder="Installment Amount..." required>
                                                @error('installment_amount')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="payment_date" class="form-label">Payment Date</label>
                                                <input type="date" id="payment_date" class="form-control" name="payment_date" placeholder="Payment Date..." required>
                                                @error('payment_date')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="payment_type" class="form-label">Payment Type</label> <br>
                                                <select name="payment_type" id="payment_type" class="form-control" required>
                                                    <option value="cash">Cash</option>
                                                    <option value="online">Online</option>
                                                    <option value="rtgs_neft">RTGS/NEFT</option>
                                                    <option value="cheque">Cheque</option>
                                                    <option value="upi">UPI</option>
                                                    <option value="dd">DD</option>
                                                </select>
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
        </section>
    </div>

@endsection
