@extends('frontend.layouts.app')
@section('content')
<style>
     .file_input {
            display: none;
    }
    .listForSelect {
        float: left;
        border-radius: 3px;
        border: 1px solid #e0e0e0;
        border-left: 0;
        margin-top: 8px;
        position: relative;
    }
    .bootstrap-select .dropdown-menu li a {
        color: #000;
    }
    dl,ol,ul {
        margin-top: 0;
        margin-bottom: 1rem;
        padding: 0;
    }
    .listForSelect ul {
        padding: 0;
    }
    .listForSelect ul li {
        float: left;
        color: #606060;
        border-left: 1px solid #e0e0e0;
        padding: 0;
        cursor: pointer;
        list-style: none;
        text-align: center;
    }
    .listForSelect ul li a{
        float: left;
        padding: 10px 18px;
        cursor: pointer;
        list-style: none;
        text-align: center;
    }
    .prop {
        color: #2b2e37;
        font-size: 15px;
        font-weight: 500;
    }
    .listForSelect>ul>li.csB {
        height: 224px;
        overflow-y: auto;
        overflow-x: hidden;
        z-index: 20;
    }
    .pt-20 {
        padding-top: 20px;
    }
    .listForSelect .dropdown-menu.show {
        display: inline-grid;
        width: 56px;
        text-align: center;
        max-height: 220px;
        overflow-y: overlay;

    }
    .dropdown-menu {
        border-radius: 0;
        min-width: 2rem;
        background: #fff;
    }
    .dropdown-toggle{
        border-radius: 0px;
    }
    .listForSelect .current {
        background: #0a69ff;
        color: #fff !important;
    }
</style>
    <div class="page-title" style="background:#f4f4f4 url({{ asset('frontend/assets/img/bg.jpg') }});" data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs-wrap">
                        <h2 class="breadcrumb-title">Edit Your Property</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="gray pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="dashboard-body">
                        <div class="dashboard-wraper">
                            <form class="form form-horizontal mar-top" action="{{route('user.property.listing.update',encrypt($property->id))}}" method="POST" enctype="multipart/form-data" id="choice_form">
                                @method('PUT')
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0 h6">Property Information</h5>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-group row">
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="properties_type">Property Type <span class="text-danger">*</span></label>
                                                    <select class="form-control select2" name="properties_type" id="properties_type"  data-live-search="true" required onchange="showDiv()">
                                                        <option value="">Select Property Type</option>
                                                        <option value="flat_apartment" @if($property->properties_type == 'flat_apartment') selected @endif>Flat/ Apartment</option>
                                                        <option value="residental_house" @if($property->properties_type == 'residental_house') selected @endif>Residential House</option>
                                                        <option value="commerical_space" @if($property->properties_type == 'commerical_space') selected @endif>Commercial Space</option>
                                                        <option value="plot" @if($property->properties_type == 'plot') selected @endif>Plot</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="property_selling_type">Property Selling Type <span class="text-danger">*</span></label>
                                                    <select class="form-control select2" name="property_selling_type" id="property_selling_type"  data-live-search="true" required>
                                                        <option value="">Select Property Selling Type</option>
                                                        <option value="buy" @if($property->property_selling_type == 'buy') selected @endif>Buy</option>
                                                        <option value="rent" @if($property->property_selling_type == 'rent') selected @endif>Rent</option>
                                                        <option value="sell" @if($property->property_selling_type == 'sell') selected @endif>Sell</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label>Property Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name" value="{{$property->name}}" placeholder="Property Name..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label>City <span class="text-danger">*</span></label>
                                                    <select name="city_id" class="form-control select2" required>
                                                        <option value="">Select City...</option>
                                                        @foreach (App\Models\Admin\City::orderBy('name','asc')->get() as $city)
                                                            <option value="{{$city->id}}" @if($property->city == $city->id) selected @endif>{{$city->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label>Landmark <span class="text-danger">*</span></label>
                                                    <input type="text" name="landmark" class="form-control" value="{{$property->landmark}}" placeholder="Enter Landmark... " required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card"  id="property_feature"  style="display:none;">
                                    <div class="card-header">
                                        <h5 class="mb-0 h6">Property Features</h5>
                                    </div>
                                    <div class="p-2">
                                        <div class="row">
                                            <div class="col-md-4 mb-2" id="bed">
                                                <b class="prop">Bedroom</b> <br>
                                                <div class="bedRooms listForSelect higt_ovfl" >
                                                    <ul>
                                                        <li class="bedroom @if($property->bedroom == '1') current @endif" onclick="select_list('bedroom','1')"><a>1</a> </li>
                                                        <li class="bedroom @if($property->bedroom == '2') current @endif" onclick="select_list('bedroom','2')"><a>2</a></li>
                                                        <li class="bedroom @if($property->bedroom == '3') current @endif" onclick="select_list('bedroom','3')"><a>3</a></li>
                                                        <li class="bedroom @if($property->bedroom == '4') current @endif" onclick="select_list('bedroom','4')"><a>4</a></li>
                                                        <li class="bedroom @if($property->bedroom == '5') current @endif" onclick="select_list('bedroom','5')"><a>5</a> </li>
                                                        <li class="btn dropdown-toggle btn_bedroom-toggle bedroom @if($property->bedroom == '6' || $property->bedroom == '7' || $property->bedroom == '8') current @endif" type="button" data-toggle="dropdown" style="width: 55px;padding:9px">@if($property->bedroom == '5' || $property->bedroom == '6' || $property->bedroom == '7' || $property->bedroom == '8') {{$property->bedroom}} @else 6 @endif</li>
                                                        <ul class="dropdown-menu bedroom_list higt_ovfl">
                                                            <li class="bedroom @if($property->bedroom == '6') current @endif" onclick="select_list('bedroom','6')"><a>6</a></li>
                                                            <li class="bedroom @if($property->bedroom == '7') current @endif" onclick="select_list('bedroom','7')"><a>7</a></li>
                                                            <li class="bedroom @if($property->bedroom == '8') current @endif" onclick="select_list('bedroom','8')"><a>8</a></li>
                                                        </ul>
                                                    </ul>
                                                </div>
                                                <select  name="bedroom" id="bedroom"  style="display:none;">
                                                    <option value='1' @if($property->bedroom == '1') selected @endif>1</option>
                                                    <option value='2' @if($property->bedroom == '2') selected @endif>2</option>
                                                    <option value='3' @if($property->bedroom == '3') selected @endif>3</option>
                                                    <option value='4' @if($property->bedroom == '4') selected @endif>4</option>
                                                    <option value='5' @if($property->bedroom == '5') selected @endif>5</option>
                                                    <option value='6' @if($property->bedroom == '6') selected @endif>6</option>
                                                    <option value='7' @if($property->bedroom == '7') selected @endif>7</option>
                                                    <option value='8' @if($property->bedroom == '8') selected @endif>8</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <b class="prop">Balconies</b><br>
                                                <div class="bedRooms listForSelect">
                                                    <ul>
                                                        <li  class="balconies @if($property->balconies == '1') current @endif" onclick="select_list('balconies','1')"><a>1</a> </li>
                                                        <li class="balconies @if($property->balconies == '2') current @endif" class="csF bdOption" onclick="select_list('balconies','2')"><a>2</a></li>
                                                        <li class="balconies @if($property->balconies == '3') current @endif" class="csF bdOption" onclick="select_list('balconies','3')"><a>3</a></li>
                                                        <li class="balconies @if($property->balconies == '4') current @endif" class="csF bdOption" onclick="select_list('balconies','4')"><a>4</a></li>
                                                        <li class="balconies @if($property->balconies == '5') current @endif" class="csF bdOption" onclick="select_list('balconies','5')"><a>5</a></li>
                                                        <li class="btn dropdown-toggle btn_balconies-toggle balconies @if($property->balconies == '6' || $property->balconies == '7' || $property->balconies == '8') current @endif" type="button" data-toggle="dropdown" style="width: 55px;padding:9px">@if($property->balconies == '5' || $property->balconies == '6' || $property->balconies == '7' || $property->balconies == '8') {{$property->balconies}} @else 6 @endif</li>
                                                        <ul class="dropdown-menu balconies_list higt_ovfl">
                                                            <li class="balconies @if($property->balconies == '6') current @endif" class="csF bdOption" onclick="select_list('balconies','6')"><a>6</a></li>
                                                            <li class="balconies @if($property->balconies == '7') current @endif" class="csF bdOption" onclick="select_list('balconies','7')"><a>7</a></li>
                                                            <li class="balconies @if($property->balconies == '8') current @endif" class="csF bdOption" onclick="select_list('balconies','8')"><a>8</a></li>
                                                        </ul>
                                                    </ul>
                                                </div>
                                                <select name="balconies" id="balconies"  style="display:none;">
                                                    <option value='1' @if($property->balconies == '1') selected @endif>1</option>
                                                    <option value='2' @if($property->balconies == '2') selected @endif>2</option>
                                                    <option value='3' @if($property->balconies == '3') selected @endif>3</option>
                                                    <option value='4' @if($property->balconies == '4') selected @endif>4</option>
                                                    <option value='5' @if($property->balconies == '5') selected @endif>5</option>
                                                    <option value='6' @if($property->balconies == '6') selected @endif>6</option>
                                                    <option value='7' @if($property->balconies == '7') selected @endif>7</option>
                                                    <option value='8' @if($property->balconies == '8') selected @endif>8</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <b class="prop"> Bathroom</b><br>
                                                <div class="bedRooms listForSelect">
                                                    <ul>
                                                        <li class="bathroom @if($property->bathroom == '1') current @endif" onclick="select_list('bathroom','1')"><a>1</a> </li>
                                                        <li class="bathroom @if($property->bathroom == '2') current @endif" onclick="select_list('bathroom','2')"><a>2</a></li>
                                                        <li class="bathroom @if($property->bathroom == '3') current @endif" onclick="select_list('bathroom','3')"><a>3</a></li>
                                                        <li class="bathroom @if($property->bathroom == '4') current @endif" onclick="select_list('bathroom','4')"><a>4</a></li>
                                                        <li class="bathroom @if($property->bathroom == '5') current @endif" onclick="select_list('bathroom','5')"><a>5</a> </li>
                                                        <li class="btn dropdown-toggle btn_bathroom-toggle bathroom @if($property->bathroom == '6' || $property->bathroom == '7' || $property->bathroom == '8') current @endif" type="button" data-toggle="dropdown" style="width: 55px;padding:9px">@if($property->bathroom == '5' || $property->bathroom == '6' || $property->bathroom == '7' || $property->bathroom == '8') {{$property->bathroom}} @else 6 @endif</li>
                                                        <ul class="dropdown-menu bathroom_list higt_ovfl">
                                                            <li class="bathroom @if($property->bathroom == '6') current @endif" onclick="select_list('bathroom','6')"><a>6</a></li>
                                                            <li class="bathroom @if($property->bathroom == '7') current @endif" onclick="select_list('bathroom','7')"><a>7</a></li>
                                                            <li class="bathroom @if($property->bathroom == '8') current @endif" onclick="select_list('bathroom','8')"><a>8</a></li>
                                                        </ul>
                                                    </ul>
                                                </div>
                                                <select  name="bathroom" id="bathroom"  style="display:none;">
                                                    <option value='1' @if($property->bathroom == '1') selected @endif>1</option>
                                                    <option value='2' @if($property->bathroom == '2') selected @endif>2</option>
                                                    <option value='3' @if($property->bathroom == '3') selected @endif>3</option>
                                                    <option value='4' @if($property->bathroom == '4') selected @endif>4</option>
                                                    <option value='5' @if($property->bathroom == '5') selected @endif>5</option>
                                                    <option value='6' @if($property->bathroom == '6') selected @endif>6</option>
                                                    <option value='7' @if($property->bathroom == '7') selected @endif>7</option>
                                                    <option value='8' @if($property->bathroom == '8') selected @endif>8</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row pt-20">
                                            <div class="col-md-5">
                                                <b class="prop">Total Floors</b><br>
                                                <div class="bedRooms listForSelect">
                                                    <ul>
                                                        <li class="total_floor @if($property->total_floor == '1') current @endif" onclick="select_list('total_floor','1')"><a>1</a> </li>
                                                        <li class="total_floor @if($property->total_floor == '2') current @endif" onclick="select_list('total_floor','2')"><a>2</a></li>
                                                        <li class="total_floor @if($property->total_floor == '3') current @endif" onclick="select_list('total_floor','3')"><a>3</a></li>
                                                        <li class="total_floor @if($property->total_floor == '4') current @endif" onclick="select_list('total_floor','4')"><a>4</a></li>
                                                        <li class="total_floor @if($property->total_floor == '5') current @endif" onclick="select_list('total_floor','5')"><a>5</a> </li>
                                                        <li class="total_floor @if($property->total_floor == '6') current @endif" onclick="select_list('total_floor','6')"><a>6</a></li>
                                                        <li class="total_floor @if($property->total_floor == '7') current @endif" onclick="select_list('total_floor','7')"><a>7</a></li>
                                                        <li class="btn dropdown-toggle btn_total_floor-toggle total_floor @if($property->total_floor >= '8') current @endif" type="button" data-toggle="dropdown" style="width: 55px;padding:9px">@if($property->total_floor >= '8') {{$property->total_floor}} @endif</li>
                                                        <ul class="dropdown-menu total_floor_list higt_ovfl">
                                                            @for($i=5;$i<=20;$i++)
                                                                <li class="total_floor @if($property->total_floor == $i) current @endif" onclick="select_list('total_floor','{{$i}}')"><a>{{$i}}</a></li>
                                                            @endfor
                                                        </ul>
                                                    </ul>
                                                </div>
                                                <select  name="total_floor" id="total_floor"  style="display:none;">
                                                    @for($i=1;$i<=20;$i++)
                                                        <option value='{{$i}}' @if($property->total_floor == $i) selected @endif>{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="prop">Furnished Status</b><br>
                                                <div class="bedRooms listForSelect">
                                                    <ul>
                                                        <li class="furnished_status @if($property->furnished_status == 'furnished') current @endif" onclick="select_list('furnished_status','furnished')"><a>Furnished</a> </li>
                                                        <li class="furnished_status @if($property->furnished_status == 'unfurnished') current @endif" onclick="select_list('furnished_status','unfurnished')"><a>Unfurnished</a></li>
                                                        <li class="furnished_status @if($property->furnished_status == 'semi-unfurnished') current @endif" onclick="select_list('furnished_status','semi-unfurnished')"><a>Semi-Furnished</a></li>
                                                    </ul>
                                                </div>
                                                <select name="furnished_status" id="furnished_status"  style="display:none;">
                                                    <option value='furnished' @if($property->furnished_status == 'furnished') selected @endif>furnished</option>
                                                    <option value='unfurnished' @if($property->furnished_status == 'unfurnished') selected @endif>unfurnished</option>
                                                    <option value='semi-unfurnished' @if($property->furnished_status == 'semi-unfurnished') selected @endif>semi-unfurnished</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row pt-20">
                                            <div class="col-md-12">
                                                <b class="prop">Floor No</b><br>
                                                <div class="bedRooms listForSelect">
                                                    <ul>
                                                        <li class="floor_no @if($property->floor_no == 'lower_basement') current @endif" onclick="select_list('floor_no','lower_basement')"><a>Lower Basemenet</a> </li>
                                                        <li class="floor_no @if($property->floor_no == 'upper_basement') current @endif" onclick="select_list('floor_no','upper_basement')"><a>Upper Basemenet</a> </li>
                                                        <li class="floor_no @if($property->floor_no == 'ground_basement') current @endif" onclick="select_list('floor_no','ground_basement')"><a>Ground Basemenet</a> </li>
                                                        <li class="floor_no @if($property->floor_no == '1') current @endif" onclick="select_list('floor_no','1')"><a>1</a></li>
                                                        <li class="floor_no @if($property->floor_no == '2') current @endif" onclick="select_list('floor_no','2')"><a>2</a></li>

                                                        <li class="btn dropdown-toggle btn_floor_no-toggle floor_no @if((int)$property->floor_no >= '3') current @endif" type="button" data-toggle="dropdown" style="width: 55px;padding:9px">@if((int)$property->floor_no >= '5') {{$property->floor_no}} @else 3 @endif</li>
                                                        <ul class="dropdown-menu floor_no_list higt_ovfl">
                                                            @for($i=3;$i<=20;$i++)
                                                        <li class="floor_no @if($property->floor_no == $i) current @endif" onclick="select_list('floor_no','{{$i}}')"><a>{{$i}}</a></li>
                                                        @endfor
                                                        </ul>
                                                    </ul>
                                                </div>
                                                <select  name="floor_no" id="floor_no"  style="display:none;">
                                                    <option value='lower_basement' @if($property->floor_no == 'lower_basement') selected @endif>lower_basement</option>
                                                    <option value='upper_basement' @if($property->floor_no == 'upper_basement') selected @endif>upper_basement</option>
                                                    <option value='ground_basement' @if($property->floor_no == 'ground_basement') selected @endif>ground_basement</option>
                                                    @for($i=1;$i<=20;$i++)
                                                        <option value='{{$i}}' @if($property->floor_no == $i) selected @endif>{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card m-2">
                                        <div class="card-header">
                                            <h5 class="mb-0 h6">Property Area</h5>
                                        </div>
                                        <div class="p-2">
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label class="col-from-label">Carpet Area</label>
                                                    <input type="number" step="0.01" min="0.00" class="form-control" name="carpet_area" value="{{$property->carpet_area}}" placeholder="Carpet Area...">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-from-label">Super Area</label>
                                                    <input type="number" step="0.01" min="0.00" class="form-control area" id="super_area" name="super_area" value="{{$property->super_area}}" placeholder="Super Area...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card"  id="property_feature_land"  style="display:none;">
                                    <div class="card-header">
                                        <h5 class="mb-0 h6">Property Features</h5>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label class="col-from-label" for="self_tieup">Self / Tieup</label>
                                                <div class="form-check">
                                                    <input class="form-check-input"  type="radio" name="self_tieup" id="self" value="self" @if($property->self_tieup == 'self') checked @endif>
                                                    <label class="form-check-label" for="self"> Self</label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="self_tieup" id="tieup" value="tieup" @if($property->self_tieup == 'tieup') checked @endif>
                                                    <label class="form-check-label" for="tieup"> Tieup</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-from-label" for="plot_type">Plot Type</label>
                                                <div class="form-check">
                                                    <input class="form-check-input"  type="radio" name="plot_type" id="commercial" value="commercial" @if($property->plot_type == 'commercial') checked @endif>
                                                    <label class="form-check-label" for="commercial"> Commercial </label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="plot_type" id="residential" value="residential" @if($property->plot_type == 'residential') checked @endif>
                                                    <label class="form-check-label" for="residential"> Residential</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="col-from-label" for="facing">Facing</label>
                                                <div class="form-check">
                                                    <input class="form-check-input"  type="radio" name="facing" id="east" value="east" @if($property->facing == 'east') checked @endif>
                                                    <label class="form-check-label" for="east"> East </label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="facing" id="west" value="west" @if($property->facing == 'west') checked @endif>
                                                    <label class="form-check-label" for="west"> West</label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="facing" id="north" value="north" @if($property->facing == 'north') checked @endif>
                                                    <label class="form-check-label" for="north"> North</label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="facing" id="south" value="south" @if($property->facing == 'south') checked @endif>
                                                    <label class="form-check-label" for="south"> South</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0 h6">Area</h5>
                                            </div>
                                            <div class="p-2">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label class="col-from-label">Plot Area (in SqFt.)</label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control area" name="plot_area" value="{{$property->plot_area}}" id="plot_area" placeholder="Plot Area...">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-from-label">Plot Length  (in feet)</label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control" name="plot_length" value="{{$property->plot_length}}" placeholder="Plot Length...">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-from-label">Plot Breadth  (in feet)</label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control" name="plot_breadth" value="{{$property->plot_breadth}}" placeholder="Plot Breadth...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0 h6">Transaction Type</h5>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="col-from-label" for="transaction_type">Transaction Type <span class="text-danger">*</span></label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input"  type="radio" name="transaction_type" id="new" value="new" @if($property->transaction_type == 'new') checked @endif required>
                                                    <label class="form-check-label" for="new"> New Property</label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="transaction_type" id="resale" value="resale" @if($property->transaction_type == 'resale') checked @endif required>
                                                    <label class="form-check-label" for="resale"> Resale</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-from-label" for="prossession_status">Possession Status <span class="text-danger">*</span></label><br>
                                                <div class="form-check">
                                                    <input class="form-check-input"  type="radio" name="prossession_status" id="under_construction" value="under_construction" @if($property->prossession_status == 'under_construction') checked @endif required>
                                                    <label class="form-check-label" for="under_construction">Under Construction</label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="prossession_status" id="ready_to_move" value="ready_to_move" @if($property->prossession_status == 'ready_to_move') checked @endif required>
                                                    <label class="form-check-label" for="ready_to_move"> Ready To Move</label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="prossession_status" id="proposed_site" value="proposed_site" @if($property->prossession_status == 'proposed_site') checked @endif required>
                                                    <label class="form-check-label" for="proposed_site"> Proposed Site</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0 h6">Price Details</h5>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-group row">
                                            <div class="col-md-4 mb-2">
                                                <label class="col-from-label">Final Price <span class="text-danger">*</span></label>
                                                <input type="number" step="0.01" min="0.00" class="form-control area" name="final_price" id="final_price" value="{{$property->final_price}}" placeholder="Final Price..."  required>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="col-from-label">Price (Per sqft.) <span class="text-danger">*</span></label>
                                                <input type="number" step="0.01" min="0.00" class="form-control" name="price" id="price_per_sq_ft" value="{{$property->price}}" placeholder="Price..." readonly>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="col-from-label">Discounted Price (Per sqft.) <span class="text-danger">*</span></label>
                                                <input type="number" step="0.01" min="0.00" class="form-control" name="discounted_price" id="discounted_price" value="{{$property->discounted_price}}" placeholder="Discounted Price..." required>
                                            </div>

                                            <div class="col-md-4 mb-2">
                                                <label class="col-from-label">Maintenance Charge (in amount)</label>
                                                <input type="number" step="0.01" min="0.00" class="form-control" name="maintenance_charge" value="{{$property->maintenance_charge}}" placeholder="Maintenance Charge...">
                                            </div>


                                            <div class="col-md-4 mb-2">
                                                <label class="col-from-label">Booking Amount</label>
                                                <input type="number" step="0.01" min="0.00" class="form-control" name="booking_amount" value="{{$property->booking_amount}}" placeholder="Booking Amount...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0 h6">Amenities</h5>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="o-features">
                                            <ul class="no-ul-list third-row">
                                                @foreach (App\Models\Admin\Amenity::orderBy('name','asc')->get() as $amenity)
                                                    <li>
                                                        <input id="{{$amenity->id}}" class="checkbox-custom" name="amenity[]" type="checkbox" value="{{$amenity->id}}" @if(is_array(json_decode($property->amenities))) @if(in_array($amenity->id,json_decode($property->amenities))) checked @endif @endif>
                                                        <label for="{{$amenity->id}}" class="checkbox-custom-label">{{$amenity->name}}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0 h6">Property Images</h5>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label for="document" class="form-label">Gallery Image</label>
                                                <div class="needsclick dropzone " id="document-dropzone">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="document" class="form-label">Thumbnail Image</label>
                                                    <div class="needsclick dropzone " id="documentThumbnail-dropzone">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input id="offer" class="checkbox-custom" name="offer" type="checkbox" value="1" @if($property->offer) checked @endif onclick="offerDivShow()">
                                                    <label for="offer" class="checkbox-custom-label">Offer</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="offer_div" @if(!$property->offer) style="display:none" @endif>
                                                <div class="form-group">
                                                    <label for="offer_text" class="checkbox-custom-label">Offer</label>
                                                    <textarea name="offer_text" rows="8" class="form-control">{{$property->offer}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-20">
                                                <label class="col-from-label">Property Details : </label>
                                                <textarea name="remark" rows="8" class="form-control">{{$property->remark}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-success">Update</button>
                                </div>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="theme-bg call_action_wrap-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call_action_wrap">
                        <div class="call_action_wrap-head">
                            <h3>Do You Have Questions ?</h3>
                            <span>We'll help you to grow your career and growth.</span>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-call_action_wrap">Contact Us <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">

        $(showDiv())

       function showDiv() {
            var property_type=  $('#properties_type').val();
            if(property_type=='flat_apartment' || property_type=='residental_house' || property_type=='commerical_space'){
                if(property_type=='commerical_space'){
                    $('#bed').hide();
                }else{
                    $('#bed').show();
                }
                $('#property_feature').show();
                $('#property_feature_land').hide();
                $('.area').change(function(){
                    var final_price  =  parseInt($('#final_price').val());
                    var area = parseInt($('#super_area').val());
                    if(final_price && area){
                        var price=final_price/area;
                        $('#price_per_sq_ft').val(price.toFixed(2));
                    }
                });
            }else if(property_type=='plot'){
                $('#property_feature').hide();
                $('#property_feature_land').show();
                $('.area').change(function(){
                    var final_price  =  parseInt($('#final_price').val());
                    var area = parseInt($('#plot_area').val());
                    if(final_price && area){
                        var price=final_price/area;
                        $('#price_per_sq_ft').val(price.toFixed(2));
                    }
                });
            }else{
                $('#bed').hide();
                $('#property_feature').hide();
                $('#property_feature_land').hide();
            }
        }

        function select_list(id,value){
            $('#'+id).val(value);
        }

        $(".bedroom_list li").on("click", function() {
            $('.btn_bedroom-toggle').text($(this).text()).addClass('current');
        });

        $(".balconies_list li").on("click", function() {
            $('.btn_balconies-toggle').text($(this).text()).addClass('current');
        });

        $(".floor_no_list li").on("click", function() {
            $('.btn_floor_no-toggle').text($(this).text()).addClass('current');
        });

        $(".total_floor_list li").on("click", function() {
            $('.btn_total_floor-toggle').text($(this).text()).addClass('current');
        });

        $(".bathroom_list li").on("click", function() {
            $('.btn_bathroom-toggle').text($(this).text()).addClass('current');
        });

        $("a").on("click", function() {
            var data_class=  $(this).parent('li').attr('class');
            $('.'+data_class).removeClass('current');
            $(this).parent('li').addClass('current');
        });

        $(function() {
            var imagesPreview = function(input, placeToInsertImagePreview) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img style="width: 100px;height: 100px;padding: 5px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });

        function gallery_image()
        {
            $('#gallery_image').empty();
        }



        function offerDivShow(){
            if($('#offer').is(":checked")){
                $('#offer_div').show()
            }else{
                $('#offer_div').hide()
            }
        }

    </script>
 <script>
    var uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
        url: '{{ route('store.media') }}',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function(file, response) {
            $('form').append('<input type="hidden" name="gallery_image[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function(file) {
            file.previewElement.remove();
            if (typeof file.name !== 'undefined') {
                name = file.name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="gallery_image[]"][value="' + name + '"]').remove();
        },
        init: function() {
            @if (isset($property) && $property->photos)
                @foreach (explode(",",$property->photos) as $media)
                    var existingFileUrl = "{{ uploaded_asset($media) }}";
                    var mockFile = {
                        name: "{{ $media }}",
                        size: "30.3",
                        accepted: true
                    };

                    // Add the mock file to the Dropzone
                    this.emit("addedfile", mockFile);
                    this.emit("thumbnail", mockFile, existingFileUrl);
                    this.emit("complete", mockFile);

                    // Disable further file uploads

                    // Customize the look and behavior of the thumbnail
                    this.options.thumbnail.call(this, mockFile, existingFileUrl);
                    $('form').append('<input type="hidden" name="gallery_image[]" value="{{ $media }}">');
                @endforeach
            @endif
        }
    }

    var uploadedDocumentThumbnailMap = {}
    Dropzone.options.documentThumbnailDropzone = {
        url: '{{ route('store.media') }}',
        maxFiles: 1,
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function(file, response) {
            $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
            uploadedDocumentThumbnailMap[file.name] = response.name
            this.disable();
        },
        removedfile: function(file) {
            file.previewElement.remove();
            if (typeof file.name !== 'undefined') {
                name = file.name
            } else {
                name = uploadedDocumentThumbnailMap[file.name]
            }
            $('form').find('input[name="image"][value="' + name + '"]').remove();
            this.enable();
        },
        init: function() {
            @if (isset($property) && $property->thumbnail_img)

                    var existingFileUrl = "{{ uploaded_asset($property->thumbnail_img) }}";
                    var mockFile = {
                        name: "{{ $property->thumbnail_img }}",
                        size: "30.3",
                        accepted: true
                    };

                    // Add the mock file to the Dropzone
                    this.emit("addedfile", mockFile);
                    this.emit("thumbnail", mockFile, existingFileUrl);
                    this.emit("complete", mockFile);

                    // Disable further file uploads

                    // Customize the look and behavior of the thumbnail
                    this.options.thumbnail.call(this, mockFile, existingFileUrl);
                    $('form').append('<input type="hidden" name="image" value="{{ $property->thumbnail_img }}">');
                    this.disable();

            @endif
        }
    }

</script>

@endsection
