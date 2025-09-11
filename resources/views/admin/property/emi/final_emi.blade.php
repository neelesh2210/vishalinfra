@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-4">
                        <h4>Property Detail:</h4>
                        <b>Booking Id: </b>{{$property->id}} <br>
                        <b>Number: </b>{{$property->property->property_number}} <br>
                        <b>Name: </b>{{$property->property->name}} <br>
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
                                            <th>EMI Date</th>
                                            <th>EMI Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($property_emis as $key=>$property_emi)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td>{{$property_emi->emi_date}}</td>
                                                <td>{{$property_emi->emi_amount}}</td>

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
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('admin.final.emi.store')}}" method="POST">
                            <input type="hidden" name="booking_id" value="{{encrypt($property->id)}}">
                            <input type="hidden" name="emi_ids" value="{{$emi_ids}}">
                            @csrf
                            <div class="col-md-6">
                                <label for="payment_type">Payment Type</label>
                                <select name="payment_type" id="payment_type" class="form-control" required="">
                                    <option value="cash">Cash</option>
                                    <option value="online">Online</option>
                                    <option value="rtgs_neft">RTGS/NEFT</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="upi">UPI</option>
                                    <option value="dd">DD</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="refrence_number">Refrence Number</label>
                                <input type="text" name="refrence_number" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="remark">Remark</label>
                                <textarea name="remark" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
