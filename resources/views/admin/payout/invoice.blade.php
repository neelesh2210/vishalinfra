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
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center mb-3 pb-2" style="border-bottom: 1px solid #ddd;">
                                        <img src="{{ asset('backend/img/logo.png') }}" alt="" style="width:40%">
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-6 invoice-col">
                                    To
                                    <address>
                                        <strong>{{ $payout->user->name }}</strong><br>
                                        <b>Email : </b> {{ $payout->user->email }}<br>
                                        <b>Phone : </b> {{ $payout->user->phone }}<br>
                                    </address>
                                </div>
                                <div class="col-sm-6 invoice-col text-right">
                                    <b>Receipt #{{ $payout->id }}</b><br>
                                    <b>Payment Date :</b> {{ $payout->created_at->format('d-M-Y') }}<br>
                                    <b>From :</b> {{config('app.name')}} <br>
                                    {{-- <b>Address :</b> {{ websiteData('address') }} <br> --}}

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Amount</th>
                                                <th>Service Charge</th>
                                                <th>TDS Charge</th>
                                                <th>Remark</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>₹ {{ $payout->amount }}</td>
                                                <td>₹ {{ $payout->service_charge }}</td>
                                                <td>₹ {{ $payout->tds_charge }}</td>
                                                <td>{{ $payout->remark }}</td>
                                                <td>₹ {{ $payout->final_amount }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <p class="lead">Term & Condition:</p>
                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        If you have not received fund in your account please contact customer support.
                                    </p>
                                </div>
                                <div class="col-4">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Total :</th>
                                                <td>₹ {{ $payout->final_amount }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row no-print">
                                <div class="col-12">
                                    <a onclick="window.print()" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
