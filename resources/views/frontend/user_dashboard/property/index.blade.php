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
                                <form id="search_form">
                                    <div class="row">
                                        <div class="col-md-3 mb-2">
                                            <label>Project Name</label>
                                            <select name="search_project" class="form-control" data-toggle="select2" onchange="fillter()">
                                                <option value="">Select Project...</option>
                                                @foreach (App\Models\Admin\Project::orderBy('name','asc')->get() as $project)
                                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>Bed Room</label>
                                            <select name="search_bedroom" class="form-control" data-toggle="select2" onchange="fillter()">
                                                <option value="">Select Bed Room...</option>
                                                @for ($i=1;$i<=8;$i++)
                                                    <option value="{{$i}}" @if($search_bedroom == $i) selected @endif>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>Room Type</label>
                                            <select name="search_room_type" class="form-control" data-toggle="select2" onchange="fillter()">
                                                <option value="">Select Room Type...</option>
                                                <option value="furnished" @if($search_room_type == 'furnished') selected @endif>Furnished</option>
                                                <option value="unfurnished" @if($search_room_type == 'unfurnished') selected @endif>Unfurnished</option>
                                                <option value='semi-unfurnished' @if($search_room_type == 'semi-unfurnished') selected @endif>Semi-Unfurnished</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>City</label>
                                            <select name="search_city" class="form-control" data-toggle="select2" onchange="fillter()">
                                                <option value="">Select City...</option>
                                                @foreach(\App\Models\Admin\City::get()  as $cities)
                                                    <option value='{{$cities->name}}' @if($search_city == $cities->name) selected @endif>{{$cities->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>Property</label>
                                            <select name="search_property" class="form-control" data-toggle="select2" onchange="fillter()">
                                                <option value="">Select Property...</option>
                                                <option value="flat_apartment" @if($search_property == 'flat_apartment') selected @endif>Flat/ Apartment</option>
                                                <option value="residental_house" @if($search_property == 'residental_house') selected @endif>Residential House</option>
                                                <option value='commerical_space' @if($search_property == 'commerical_space') selected @endif>Commercial Space</option>
                                                <option value="plot" @if($search_property == 'plot') selected @endif>Plot</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>Price</label>
                                            <select name="search_price" class="form-control" data-toggle="select2" onchange="fillter()">
                                                <option value="">Select Price...</option>
                                                <option value="price_high_low" @if($search_price == 'price_high_low') selected @endif>Price(High > Low)</option>
                                                <option value="price_low_high" @if($search_price == 'price_low_high') selected @endif>Price(Low > High)</option>
                                                <option value='carpet_high_low' @if($search_price == 'carpet_high_low') selected @endif>Carpet Area(High > Low)</option>
                                                <option value="carpet_low_high" @if($search_price == 'carpet_low_high') selected @endif>Carpet Area(Low > High)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>Status</label>
                                            <select name="search_status" class="form-control" data-toggle="select2" onchange="fillter()">
                                                <option value="">Select Status...</option>
                                                <option value="1" @if($search_status == '1') selected @endif>Available</option>
                                                <option value="0" @if($search_status == '0') selected @endif>Not Available</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2 mt-1">
                                            <label>Search</label>
                                            <div class="input-group input-group-sm">
                                            <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" placeholder="Search..." onkeyup="fillter()">
                                            <div class="input-group-append" style="border: 1px solid #ddd;">
                                                <button type="button" class="btn btn-default">
                                                    <i class="uil-search"></i>
                                                </button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div id="table">
                                    @include('frontend.user_dashboard.property.table')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function fillter(){
            $.ajax({
                type: 'GET',
                url: "{{route('user.property.index')}}",
                data: $('#search_form').serialize(),
                success: function(data) {
                    $('#table').html(data)
                }
            });
        }

    </script>

@endsection
