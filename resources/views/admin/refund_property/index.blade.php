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
                                    <form action="{{route('admin.refund.property.store',$book_property->book_property_id)}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="property_number" class="form-label">Property Number</label>
                                                <input type="text" id="property_number" class="form-control" name="property_number" value="{{$book_property->property->property_number}}" placeholder="Property Number..." readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="property_name" class="form-label">Property Name</label>
                                                <input type="text" id="property_name" class="form-control" value="{{$book_property->property->name}}" placeholder="Property Name..." readonly>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="total_paid_amount" class="form-label">Total Paid Amount</label>
                                                <input type="text" id="total_paid_amount" class="form-control" name="total_paid_amount" value="{{$book_property->installments_sum_final_amount}}" placeholder="Total Paid Amount..." readonly>
                                                <span>{{ucwords(getIndianCurrency($book_property->installments_sum_final_amount))}}</span>
                                            </div>
                                            @php
                                                $refund_percent = App\Models\Admin\Charge::where('type','refund_percent')->first();
                                            @endphp
                                            <div class="col-md-3 mb-3">
                                                <label for="total_refund_amount" class="form-label">Total Refund Amount</label>
                                                <input type="text" id="total_refund_amount" class="form-control" name="total_refund_amount" value="{{$book_property->installments_sum_final_amount - ($book_property->installments_sum_final_amount*$refund_percent->amount)/100}}" placeholder="Total Paid Amount..." required>
                                                <span>{{ucwords(getIndianCurrency($book_property->installments_sum_final_amount - ($book_property->installments_sum_final_amount*$refund_percent->amount)/100))}}</span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Customer</label>
                                                <input type="text" value="{{$book_property->customer_name}} ({{$book_property->customer_phone}})" class="form-control" readonly>
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
