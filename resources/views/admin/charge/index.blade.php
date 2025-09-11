@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title) {{$page_title}} @endisset</h5>
                            </div>
                            <form action="{{route('admin.charge.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body p-2">
                                    <div class="row">
                                        <div class="col-md-4 form_div">
                                            @php
                                                $service_charge = App\Models\Admin\Charge::where('type','service_charge')->first();
                                            @endphp
                                            <label for="service_charge">Service Charges (in %)</label>
                                            <div class="input-group mb-3">
                                                <input type="number" step="0.01" name="service_charge" value="{{$service_charge?->amount}}" class="form-control" placeholder="Enter Service Charge...">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                            @error('service_charge')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form_div">
                                            @php
                                                $tds_charge = App\Models\Admin\Charge::where('type','tds_charge')->first();
                                            @endphp
                                            <label for="tds_charge">TDS Charges (in %)</label>
                                            <div class="input-group mb-3">
                                                <input type="number" step="0.01" name="tds_charge" value="{{$tds_charge?->amount}}" class="form-control" placeholder="Enter TDS Charge...">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                            @error('tds_charge')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form_div">
                                            @php
                                                $token_amount = App\Models\Admin\Charge::where('type','token_amount')->first();
                                            @endphp
                                            <label for="token_amount">Token Amount</label>
                                            <div class="input-group mb-3">
                                                <input type="number" step="0.01" name="token_amount" value="{{$token_amount?->amount}}" class="form-control" placeholder="Enter Token Amount...">
                                                <div class="input-group-append">
                                                    <select name="token_amount_type" class="input-group-text">
                                                        <option value="percent" @if($token_amount?->amount_type == 'percent') selected @endif>%</option>
                                                        <option value="amount" @if($token_amount?->amount_type == 'amount') selected @endif>₹</option>
                                                    </select>
                                                </div>
                                            </div>
                                            @error('token_amount_type')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form_div">
                                            @php
                                                $booking_amount = App\Models\Admin\Charge::where('type','booking_amount')->first();
                                            @endphp
                                            <label for="booking_amount">Booking Amount</label>
                                            <div class="input-group mb-3">
                                                <input type="number" step="0.01" name="booking_amount" value="{{$booking_amount?->amount}}" class="form-control" placeholder="Enter Booking Amount...">
                                                <div class="input-group-append">
                                                    <select name="booking_amount_type" class="input-group-text">
                                                        <option value="percent" @if($booking_amount?->amount_type == 'percent') selected @endif>%</option>
                                                        <option value="amount" @if($booking_amount?->amount_type == 'amount') selected @endif>₹</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form_div">
                                            @php
                                                $registry_amount = App\Models\Admin\Charge::where('type','registry_amount')->first();
                                            @endphp
                                            <label for="registry_amount">Registry Amount</label>
                                            <div class="input-group mb-3">
                                                <input type="number" step="0.01" name="registry_amount" value="{{$registry_amount?->amount}}" class="form-control" placeholder="Enter Registry Amount...">
                                                <div class="input-group-append">
                                                    <select name="registry_amount_type" class="input-group-text">
                                                        <option value="percent" @if($registry_amount?->amount_type == 'percent') selected @endif>%</option>
                                                        <option value="amount" @if($registry_amount?->amount_type == 'amount') selected @endif>₹</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form_div">
                                            @php
                                                $commission_amount = App\Models\Admin\Charge::where('type','commission_amount')->first();
                                            @endphp
                                            <label for="commission_amount">Commission Amount</label>
                                            <div class="input-group mb-3">
                                                <input type="number" step="0.01" name="commission_amount" value="{{$commission_amount?->amount}}" class="form-control" placeholder="Enter Commission Amount...">
                                                <div class="input-group-append">
                                                    <select name="commission_amount_type" class="input-group-text">
                                                        <option value="percent" @if($commission_amount?->amount_type == 'percent') selected @endif>%</option>
                                                        <option value="amount" @if($commission_amount?->amount_type == 'amount') selected @endif>₹</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form_div">
                                            @php
                                                $min_commission_amount = App\Models\Admin\Charge::where('type','min_commission_amount')->first();
                                            @endphp
                                            <label for="min_commission_amount">Min Commission Amount</label>
                                            <div class="input-group mb-3">
                                                <input type="number" step="0.01" name="min_commission_amount" value="{{$min_commission_amount?->amount}}" class="form-control" placeholder="Enter Min Commission Amount...">
                                                <div class="input-group-append">
                                                    <select name="min_commission_amount_type" class="input-group-text">
                                                        <option value="percent" @if($min_commission_amount?->amount_type == 'percent') selected @endif>%</option>
                                                        <option value="amount" @if($min_commission_amount?->amount_type == 'amount') selected @endif>₹</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form_div">
                                            @php
                                                $refund_percent = App\Models\Admin\Charge::where('type','refund_percent')->first();
                                            @endphp
                                            <label for="refund_percent">Refund Percent</label>
                                            <div class="input-group mb-3">
                                                <input type="number" step="0.01" name="refund_percent" value="{{$refund_percent?->amount}}" class="form-control" placeholder="Enter Refund Percent...">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                            @error('refund_percent')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header text-center">
                                    <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Submit?');"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
