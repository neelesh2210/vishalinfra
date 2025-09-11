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
                                    <form action="{{route('admin.convert.to.emi.store',encrypt($property->id))}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="property_number" class="form-label">Property Number</label>
                                                <input type="text" id="property_number" class="form-control" name="property_number" value="{{$property->property->property_number}}" placeholder="Property Number..." readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="property_name" class="form-label">Property Name</label>
                                                <input type="text" id="property_name" class="form-control" value="{{$property->property->name}}" placeholder="Property Name..." readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="total_emi_amount" class="form-label">Total EMI Amount</label>
                                                <input type="text" id="total_emi_amount" class="form-control" name="total_emi_amount" value="{{$property->property->final_price - $property->installments_sum_amount}}" placeholder="Total EMI Amount..." readonly>
                                                <span>{{ucwords(getIndianCurrency($property->property->final_price - $property->installments_sum_amount))}}</span>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">Customer</label>
                                                <input type="text" value="{{$property->customer_name}} ({{$property->customer_phone}})" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="emi_charge" class="form-label">EMI Charge</label>
                                                <input type="number" id="emi_charge" class="form-control" name="emi_charge" value="0" placeholder="EMI Charge..." required onkeyup="emiAmountCalculation()">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="emi_month" class="form-label">EMI Month</label>
                                                <select name="emi_month" id="emi_month" class="form-control" onchange="emiAmountCalculation()">
                                                    <option value="1">1 Month</option>
                                                    <option value="3">3 Month</option>
                                                    <option value="6">6 Month</option>
                                                    <option value="9">9 Month</option>
                                                    <option value="12">12 Month</option>
                                                    <option value="18">18 Month</option>
                                                    <option value="24">24 Month</option>
                                                    <option value="36">36 Month</option>
                                                    <option value="48">48 Month</option>
                                                    <option value="60">60 Month</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="emi_amount" class="form-label">EMI Amount</label>
                                                <input type="text" id="emi_amount" class="form-control" name="emi_amount" placeholder="EMI Charge..." readonly>
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

    <script>
        $(emiAmountCalculation());

        function emiAmountCalculation(){
            var total_emi_amount = "{{$property->property->final_price - $property->installments_sum_amount}}";
            var emi_month = $('#emi_month').val();
            var emi_charge = $('#emi_charge').val();
            if(!emi_charge){
                emi_charge = 0;
                $('#emi_charge').val('0');
            }
            var final_amount = ((parseFloat(total_emi_amount)+parseFloat(emi_charge))/parseInt(emi_month)).toFixed(2);
            $('#emi_amount').val(final_amount);
        }

    </script>

@endsection
