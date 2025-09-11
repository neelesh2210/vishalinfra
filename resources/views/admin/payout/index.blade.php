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
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <div class="card-tools">
                                    <form action="{{route('admin.payout.index')}}" id="search_form">
                                        <div class="row">
                                            <div class="input-group input-group-sm" style="width: 200px;">
                                                <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" placeholder="Search" onkeyup="fillter()">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-2" id="table">
                                @include('admin.payout.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal" tabindex="-1" id="payout_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Payout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.payout.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="modal-body">
                        <label for="user_detail">User Detail</label>
                        <input type="text" id="user_detail" class="form-control" readonly>
                        <label for="amount" class="mt-2">Amount</label>
                        <input type="number" id="amount" name="amount" step="0.01" class="form-control" onkeyup="calculateCharges()">
                        {{-- <label for="service_charge" class="mt-2">Service Charge</label>
                        <input id="service_charge" class="form-control" readonly>
                        <label for="tds_charge" class="mt-2">TDS Charge</label>
                        <input id="tds_charge" class="form-control" readonly>
                        <label for="final_amount" class="mt-2">Final Amount</label>
                        <input id="final_amount" class="form-control" readonly> --}}
                        <label for="check" class="mt-2">Check</label>
                        <input type="radio" id="check" name="payment_type" value="check">
                        <label for="online" class="mt-2">Online</label>
                        <input type="radio" id="online" name="payment_type" value="online">
                        <label for="cash" class="mt-2">Cash</label>
                        <input type="radio" id="cash" name="payment_type" value="cash" checked> <br>
                        <label for="payment_detail" class="mt-2">Payment Detail</label>
                        <input type="text" name="payment_detail" id="payment_detail" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Pay</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js')

        <script>

            function fillter(){
                $('tbody').addClass('loading')
                $.ajax({
                    type: 'GET',
                    url: "{{route('admin.payout.index')}}",
                    data: $('#search_form').serialize(),
                    success: function(data) {
                        $('tbody').removeClass('loading')
                        $('#table').html(data)
                    }
                });
            }

            function payout(customer_id,amount,name,phone){
                $('#user_detail').val(name+' ('+phone+')')
                $('#user_id').val(customer_id)
                $('#amount').val(amount)
                $('#amount').attr('max',amount)
                calculateCharges()
                $('#payout_modal').modal('show')
            }

            function calculateCharges(){
                var amount =  $('#amount').val()
                $.ajax({
                    type: 'POST',
                    url: "{{route('admin.calculate.charge')}}",
                    data: {
                        _token:"{{csrf_token()}}",
                        amount:amount
                    },
                    success: function(data) {
                        $('#service_charge').val(data.service_amount)
                        $('#tds_charge').val(data.tds_amount)
                        $('#final_amount').val(data.final_amount)
                    }
                });
            }

        </script>

    @endpush


@endsection
