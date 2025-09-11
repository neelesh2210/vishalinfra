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
                                <form action="{{route('admin.payments')}}">
                                    <div class="row">
                                        <div class="col-md-2 mb-2"></div>
                                        <div class="col-md-4 mb-2">
                                            <label>Date</label>
                                            <div class="input-group input-group-sm mr-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="search_date" value="{{$search_date}}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label>Property</label>
                                            <select name="search_property" id="search_property" class="form-control select2">
                                                <option value="">Select Property</option>
                                                @foreach (App\Models\Admin\Property::oldest('name')->get() as $property)
                                                    <option value="{{$property->id}}" @if($search_property == $property->id) selected @endif>{{$property->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-1 mb-2 mt-4 text-right">
                                            <button type="submit" class="btn btn-default">
                                                Search
                                            </button>
                                        </div>
                                        <div class="col-md-1 mb-2 mt-4 text-right">
                                            <button type="submit" name="export" value="export" class="btn btn-default">
                                                Export
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body table-responsive p-2">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Booking Detail</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Taken By</th>
                                            <th class="text-center">Payment Type</th>
                                            <th class="text-center">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($installments as $key=>$installment)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($installments->currentPage() - 1)*$installments->perPage()}}</td>
                                                <td>
                                                    <b>Booking Id:</b> {{$installment->booking->book_property_id}} <br>
                                                    <b>Property Name:</b> {{$installment->booking->property->name}}
                                                </td>
                                                <td>
                                                    <b>Amount: </b> ₹{{$installment->amount}} <br>
                                                    <b>Discount: </b> ₹{{$installment->discount_amount}} <br>
                                                    <b>Final: </b> ₹{{$installment->final_amount}}
                                                </td>
                                                <td class="text-center">
                                                    {{App\Models\User::where('id',$installment->taken_by)->first()->name}}
                                                </td>
                                                <td class="text-center">{{ucfirst($installment->payment_detail)}}</td>
                                                <td class="text-center">{{$installment->created_at}}</td>
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
                                        <p><b>Showing {{($installments->currentpage()-1)*$installments->perpage()+1}} to {{(($installments->currentpage()-1)*$installments->perpage())+$installments->count()}} of {{$installments->total()}} Installments</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $installments->appends(['search_date'=>$search_date,'search_property'=>$search_property])->links() !!}
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
