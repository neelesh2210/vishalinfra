@extends('frontend.user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="page-title-box">
                            <h4 class="page-title">Property List</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="table">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Property Type</th>
                                                <th class="text-center">Property Name</th>
                                                <th class="text-center">Property</th>
                                                <th class="text-center">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($properties as $key=>$property)
                                                <tr>
                                                    <td class="text-center">{{($key+1) + ($properties->currentPage() - 1)*$properties->perPage()}}</td>
                                                    <td class="text-center">{{ucwords(str_replace('_',' ',$property->properties_type))}}</td>
                                                    <td class="text-center">{{$property->name}}</td>
                                                    <td>
                                                        <b>Name: </b>{{$property->name}} <br>
                                                        <b>Plot Number: </b>{{$property->plot_number}} <br>
                                                        <b>Plot Area: </b>{{$property->plot_area}} sqft. ({{$property->plot_length}}X{{$property->plot_breadth}})
                                                    </td>
                                                    <td>
                                                        <b>Price: </b>{{$property->expected_price}} <br>
                                                        <b>sqft. Price: </b>{{$property->price}}
                                                    </td>
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
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>Showing {{($properties->currentpage()-1)*$properties->perpage()+1}} to {{(($properties->currentpage()-1)*$properties->perpage())+$properties->count()}} of {{$properties->total()}} Properties</b></p>
                                        </div>
                                        <div class="col-md-8 d-flex justify-content-end">
                                            {!! $properties->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
