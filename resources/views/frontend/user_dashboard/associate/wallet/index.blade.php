@extends('frontend.user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="page-title-box">
                            <h4 class="page-title">Transaction List</h4>
                        </div>
                    </div>
                    <div class="col-6 text-end">
                        <div class="page-title-box">
                            <b class="page-title">Remaining Amount: </b>₹ {{associateWallet(Auth::guard('web')->user()->id)['remaining_wallet_balance']}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <form action="{{route('user.traffic')}}">
                                    <div class="row">
                                        <div class="col-md-2 mb-3"></div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Date Range Pick</label>
                                            <input class="form-control input-daterange-datepicker" id="reservation" type="text" name="search_date" value="{{$search_date}}" placeholder="Select Date Range...">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Packages Types</label>
                                            <select class="form-select" id="example-select" name="search_plan_id">
                                                <option value="">Select Plan...</option>
                                                @foreach (App\Models\Admin\Plan::all() as $plan)
                                                    <option value="{{$plan->id}}" @if($search_plan == $plan->id) selected @endif>{{$plan->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Search</label>
                                            <input type="text" class="form-control" placeholder="Enter Name,Phone,Email..." name="search_key" value="{{$search_key}}">
                                        </div>
                                        <div class="col-md-1 mb-3">
                                            <button type="subit" class="btn btn-primary mt-3_5">Filter</button>
                                        </div>
                                    </div>
                                    <hr>
                                </form> --}}
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($transactions as $key=>$transaction)
                                            <tr>
                                                <td>{{($key+1) + ($transactions->currentPage() - 1)*$transactions->perPage()}}</td>
                                                <td>{{$transaction->amount}}</td>
                                                <td>{{ucwords($transaction->transaction_type)}}</td>
                                                <td>{{$transaction->created_at->format('d-M-Y h:i A')}}</td>
                                                <td>{{$transaction->remark}}</td>
                                            </tr>
                                        @empty
                                            <tr class="footable-empty">
                                                <td colspan="11">
                                                    <center style="padding: 70px;"><i class="uil-frown" style="font-size: 100px;"></i><br>
                                                        <h2>Nothing Found</h2>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {!! $transactions->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
