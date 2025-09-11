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
                            <div class="card-body table-responsive p-2" id="table">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Booking Record</th>
                                            <th class="text-center">Property</th>
                                            <th class="text-center">Refund Amount</th>
                                            <th class="text-center">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($refund_properties as $key=>$refund_property)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($refund_properties->currentPage() - 1)*$refund_properties->perPage()}}</td>
                                                <td>
                                                    <b>Booking Id: </b>{{$refund_property->bookProperty->book_property_id }} <br>
                                                    <b>Date: </b>{{$refund_property->bookProperty->created_at->format('d-m-Y h:i A')}} <br>
                                                    <b>Customer Name: </b>{{$refund_property->bookProperty->customer_name}} <br>
                                                    <b>Customer Number: </b> {{$refund_property->bookProperty->customer_phone}}
                                                </td>
                                                <td>
                                                    <b>Name: </b>{{$refund_property->bookProperty->property->name}} <br>
                                                    <b>Plot Number: </b>{{$refund_property->bookProperty->property->plot_number}} <br>
                                                    <b>Plot Area: </b>{{$refund_property->bookProperty->property->plot_area}} sqft. ({{$refund_property->bookProperty->property->plot_length}}X{{$refund_property->bookProperty->property->plot_breadth}}) <br>
                                                    <b>Project: </b>{{$refund_property->bookProperty->property->project->name}} <br>
                                                </td>
                                                <td class="text-center">₹ {{$refund_property->amount}}</td>
                                                <td class="text-center">{{$refund_property->created_at->format('d-m-Y h:i A')}}</td>
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
                                        <p><b>Showing {{($refund_properties->currentpage()-1)*$refund_properties->perpage()+1}} to {{(($refund_properties->currentpage()-1)*$refund_properties->perpage())+$refund_properties->count()}} of {{$refund_properties->total()}} Refund Properties</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $refund_properties->links() !!}
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
