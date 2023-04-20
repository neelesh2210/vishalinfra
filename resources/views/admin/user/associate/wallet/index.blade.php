@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">@isset($page_title) {{$page_title}} @endisset</li>
                            @php
                                $user = App\Models\User::where('id',$assocaite_id)->first();
                            @endphp
                            <li class="breadcrumb-item active">{{$user->name}} ({{$user->phone}})</li>
                        </ol>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <div class="card-tools">

                                        </div>
                                    </div>
                                    <div class="card-body p-2">
                                        <div class="modal-body">
                                            <form action="{{route('admin.associate.wallet.store')}}" class="form-example" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" name="user_id" value="{{$assocaite_id}}">
                                                    <div class="col-md-6 form_div">
                                                        <div class="form-group">
                                                            <label for="amount">Amount <span class="text-danger">*</span> </label>
                                                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount..." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 form_div">
                                                        <div class="form-group">
                                                            <label for="remark">Remark</label>
                                                            <input type="text" class="form-control" id="remark" name="remark" placeholder="Enter Remark..." required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-outline-success">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <form action="{{route('admin.associate.wallet.index',$assocaite_id)}}">
                                    <div class="row">
                                        <div class="col-md-6 mb-2 mt-1"></div>
                                        <div class="col-md-3 mb-2 mt-1">
                                            <label>Search</label>
                                            <div class="input-group input-group-sm mr-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="search_date" value="{{$search_date}}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2 mt-1">
                                            <label>Search</label>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" placeholder="Search..." onkeyup="fillter()">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body table-responsive p-2" id="table">
                                <table class="table table-bordered table-striped">
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
                                                    <center style="padding: 70px;"><i class="far fa-frown" style="font-size: 100px;"></i><br>
                                                        <h2>Nothing Found</h2>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><b>Showing {{($transactions->currentpage()-1)*$transactions->perpage()+1}} to {{(($transactions->currentpage()-1)*$transactions->perpage())+$transactions->count()}} of {{$transactions->total()}} Transactions</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $transactions->appends(['search_date'=>$search_date,'search_key'=>$search_key])->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
