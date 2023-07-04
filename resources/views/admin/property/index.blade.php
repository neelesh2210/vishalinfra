@extends('admin.layouts.app')
@section('content')
<style>
.input-group-sm>.form-control:not(textarea) {
    height: 35px;
}
.input-group-sm>.form-control{
    border-radius: 0;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 20px;
}
.select2-container--default .select2-selection--single {
    display: block;
    width: 100%;
    padding: 0.6rem 1rem;
    border-radius: 0;
    font-size: 1rem;
    height: 35px;
    /* line-height: 35px; */
    border: 1px solid #e2e5ec;
    color: #898b92;
}
</style>
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
                    {{-- <div class="col-sm-6">
                        <a href="{{route('admin.property.create')}}" class="btn btn-primary float-right">Add Property <i class="fas fa-plus"></i></a>
                    </div> --}}
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card @if($search_bedroom || $search_room_type || $search_city || $search_property || $search_price || $search_status || $search_key || $search_user_type) @else collapsed-card @endif">
                            <div class="card-header">
                                <h3 class="card-title">Fillter</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="@if($search_bedroom || $search_room_type || $search_city || $search_property || $search_price || $search_status || $search_key || $search_user_type) fas fa-minus @else fas fa-plus @endif"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="search_form">
                                    <div class="row">
                                        <div class="col-md-3 mb-2">
                                            <label>Bed Room</label>
                                            <select name="search_bedroom" class="form-control select2" onchange="fillter()">
                                                <option value="">Select Bed Room...</option>
                                                @for ($i=1;$i<=8;$i++)
                                                    <option value="{{$i}}" @if($search_bedroom == $i) selected @endif>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>Room Type</label>
                                            <select name="search_room_type" class="form-control select2" onchange="fillter()">
                                                <option value="">Select Room Type...</option>
                                                <option value="furnished" @if($search_room_type == 'furnished') selected @endif>Furnished</option>
                                                <option value="unfurnished" @if($search_room_type == 'unfurnished') selected @endif>Unfurnished</option>
                                                <option value='semi-unfurnished' @if($search_room_type == 'semi-unfurnished') selected @endif>Semi-Unfurnished</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>City</label>
                                            <select name="search_city" class="form-control select2" onchange="fillter()">
                                                <option value="">Select City...</option>
                                                @foreach(\App\Models\Admin\City::get()  as $cities)
                                                    <option value='{{$cities->name}}' @if($search_city == $cities->name) selected @endif>{{$cities->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>Property</label>
                                            <select name="search_property" class="form-control select2" onchange="fillter()">
                                                <option value="">Select Property...</option>
                                                <option value="flat_apartment" @if($search_property == 'flat_apartment') selected @endif>Flat/ Apartment</option>
                                                <option value="residental_house" @if($search_property == 'residental_house') selected @endif>Residential House</option>
                                                <option value='commerical_space' @if($search_property == 'commerical_space') selected @endif>Commercial Space</option>
                                                <option value="plot" @if($search_property == 'plot') selected @endif>Plot</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>Price</label>
                                            <select name="search_price" class="form-control select2" onchange="fillter()">
                                                <option value="">Select Price...</option>
                                                <option value="price_high_low" @if($search_price == 'price_high_low') selected @endif>Price(High > Low)</option>
                                                <option value="price_low_high" @if($search_price == 'price_low_high') selected @endif>Price(Low > High)</option>
                                                <option value='carpet_high_low' @if($search_price == 'carpet_high_low') selected @endif>Carpet Area(High > Low)</option>
                                                <option value="carpet_low_high" @if($search_price == 'carpet_low_high') selected @endif>Carpet Area(Low > High)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>Status</label>
                                            <select name="search_status" class="form-control select2" onchange="fillter()">
                                                <option value="">Select Status...</option>
                                                <option value="1" @if($search_status == '1') selected @endif>Available</option>
                                                <option value="0" @if($search_status == '0') selected @endif>Not Available</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>User Type</label>
                                            <select name="search_user_type" class="form-control select2" onchange="fillter()">
                                                <option value="">Select USer Type...</option>
                                                <option value="buyer_owner" @if($search_user_type == 'buyer_owner') selected @endif>Buyer/Owner</option>
                                                <option value="agent" @if($search_user_type == 'agent') selected @endif>Agent</option>
                                                <option value="builder" @if($search_user_type == 'builder') selected @endif>Builder</option>
                                            </select>
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
                            <div class="card-footer text-center">
                                <a class="btn btn-primary" onclick="$('#search_form').submit()">Fillter</a>
                            </div>
                        </div>

                        <div class="card card-outline card-primary">
                            {{-- <div class="card-header">
                                <div class="card-tools">
                                    <form id="search_form">
                                        <div class="row">
                                            <div class="col-md-3 mb-2">
                                                <label style="margin-bottom: 13px;">Bed Room</label>
                                                <div class="input-group input-group-sm mr-2">
                                                    <select name="search_bedroom" class="form-control select2" onchange="fillter()">
                                                        <option value="">Select Bed Room...</option>
                                                        @for ($i=1;$i<=8;$i++)
                                                            <option value="{{$i}}" @if($search_bedroom == $i) selected @endif>{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label>Room Type</label>
                                                <select name="search_room_type" class="form-control select2" onchange="fillter()">
                                                    <option value="">Select Room Type...</option>
                                                    <option value="furnished" @if($search_room_type == 'furnished') selected @endif>Furnished</option>
                                                    <option value="unfurnished" @if($search_room_type == 'unfurnished') selected @endif>Unfurnished</option>
                                                    <option value='semi-unfurnished' @if($search_room_type == 'semi-unfurnished') selected @endif>Semi-Unfurnished</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label>City</label>
                                                <select name="search_city" class="form-control select2" onchange="fillter()">
                                                    <option value="">Select City...</option>
                                                    @foreach(\App\Models\Admin\City::get()  as $cities)
                                                        <option value='{{$cities->name}}' @if($search_city == $cities->name) selected @endif>{{$cities->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label>Property</label>
                                                <select name="search_property" class="form-control select2" onchange="fillter()">
                                                    <option value="">Select Property...</option>
                                                    <option value="flat_apartment" @if($search_property == 'flat_apartment') selected @endif>Flat/ Apartment</option>
                                                    <option value="residental_house" @if($search_property == 'residental_house') selected @endif>Residential House</option>
                                                    <option value='commerical_space' @if($search_property == 'commerical_space') selected @endif>Commercial Space</option>
                                                    <option value="plot" @if($search_property == 'plot') selected @endif>Plot</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label>Price</label>
                                                <select name="search_price" class="form-control select2" onchange="fillter()">
                                                    <option value="">Select Price...</option>
                                                    <option value="price_high_low" @if($search_price == 'price_high_low') selected @endif>Price(High > Low)</option>
                                                    <option value="price_low_high" @if($search_price == 'price_low_high') selected @endif>Price(Low > High)</option>
                                                    <option value='carpet_high_low' @if($search_price == 'carpet_high_low') selected @endif>Carpet Area(High > Low)</option>
                                                    <option value="carpet_low_high" @if($search_price == 'carpet_low_high') selected @endif>Carpet Area(Low > High)</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label>Status</label>
                                                <select name="search_status" class="form-control select2" onchange="fillter()">
                                                    <option value="">Select Status...</option>
                                                    <option value="1" @if($search_status == '1') selected @endif>Available</option>
                                                    <option value="0" @if($search_status == '0') selected @endif>Not Available</option>
                                                </select>
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
                            </div> --}}
                            <div class="card-body table-responsive p-2" id="table">
                                @include('admin.property.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>

        function fillter(){
            $('tbody').addClass('loading')
            $.ajax({
                type: 'GET',
                url: "{{route('admin.property.index')}}",
                data: $('#search_form').serialize(),
                success: function(data) {
                    $('tbody').removeClass('loading')
                    $('#table').html(data)
                }
            });
        }

    </script>

@endsection
