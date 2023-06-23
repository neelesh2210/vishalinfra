@extends('frontend.layouts.app')
@section('content')
<style>
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

    .dropdown-menu.show {
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
                        <h2 class="breadcrumb-title">Submit Your Property</h2>
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
                            <form class="form form-horizontal mar-top" action="{{route('user.property.listing.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0 h6">Property Information</h5>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-group row">
                                            @if($times > 0)
                                                <div class="col-md-4 form_div">
                                                    <div class="form-group">
                                                        <label for="purchase_plan_id">Select Plan <span class="text-danger">*</span></label>
                                                        <select class="form-control select2" name="purchase_plan_id" id="purchase_plan_id"  data-live-search="true" required>
                                                            <option value="">Select Plan...</option>
                                                            @foreach ($plan_purchases as $plan_purchase)
                                                                @if($plan_purchase->property_count < $plan_purchase->number_of_property)
                                                                    <option value="{{$plan_purchase->id}}">{{$plan_purchase->plan->name}} Expire at {{$plan_purchase->created_at->addDay($plan_purchase->duration_in_day)}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            @if(Auth::guard('web')->user()->type == 'builder')
                                                <div class="col-md-4 form_div">
                                                    <div class="form-group">
                                                        <label for="project_id">Select Project <span class="text-danger">*</span></label>
                                                        <select class="form-control select2" name="project_id" id="project_id"  data-live-search="true" required>
                                                            <option value="">Select Project...</option>
                                                            @foreach ($projects as $project)
                                                                <option value="{{$project->id}}">{{$project->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="properties_type">Property Type <span class="text-danger">*</span></label>
                                                    <select class="form-control select2" name="properties_type" id="properties_type"  data-live-search="true" required>
                                                        <option value="">Select Property Type</option>
                                                        <option value="flat_apartment" >Flat/ Apartment</option>
                                                        <option value="residental_house">Residential House</option>
                                                        <option value="commerical_space">Commercial Space</option>
                                                        <option value="plot">Plot</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label>Property Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name" placeholder="Property Name..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label>City <span class="text-danger">*</span></label>
                                                    <select name="city_id" class="form-control select2" required>
                                                        <option value="">Select City...</option>
                                                        @foreach (App\Models\Admin\City::orderBy('name','asc')->get() as $city)
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label>Landmark <span class="text-danger">*</span></label>
                                                    <input type="text" name="landmark" class="form-control" placeholder="Enter Landmark... " required>
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
                                            <div class="col-md-6 mb-2" id="bed">
                                                <b class="prop">Bedroom</b> <br>
                                                <div class="bedRooms listForSelect" >
                                                    <ul>
                                                        <li class="bedroom" onclick="select_list('bedroom','1')"><a>1</a> </li>
                                                        <li class="bedroom" onclick="select_list('bedroom','2')"><a>2</a></li>
                                                        <li class="bedroom" onclick="select_list('bedroom','3')"><a>3</a></li>
                                                        <li class="bedroom" onclick="select_list('bedroom','4')"><a>4</a></li>
                                                        <li class="bedroom" onclick="select_list('bedroom','5')"><a>5</a> </li>
                                                        <li class="bedroom" onclick="select_list('bedroom','6')"><a>6</a></li>
                                                        <li class="bedroom" onclick="select_list('bedroom','7')"><a>7</a></li>
                                                        <li class="bedroom" onclick="select_list('bedroom','8')"><a>8</a></li>
                                                        <li class="bedroom" onclick="select_list('bedroom','9')"><a>9</a></li>
                                                        <li class="btn dropdown-toggle btn_bedroom-toggle bedroom" type="button" data-toggle="dropdown" style="width: 55px;padding:9px">10</li>
                                                        <ul class="dropdown-menu bedroom_list">
                                                            <li  class="bedroom" onclick="select_list('bedroom','11')"><a>11</a></li>
                                                            <li  class="bedroom" onclick="select_list('bedroom','12')"><a>12</a></li>
                                                        </ul>
                                                    </ul>
                                                </div>
                                                <select  name="bedroom" id="bedroom"  style="display:none;">
                                                    <option value='1' >1</option>
                                                    <option value='2' >2</option>
                                                    <option value='3' >3</option>
                                                    <option value='4' >4</option>
                                                    <option value='5' >5</option>
                                                    <option value='6' >6</option>
                                                    <option value='7' >7</option>
                                                    <option value='8' >8</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <b class="prop">Balconies</b><br>
                                                <div class="bedRooms listForSelect">
                                                    <ul>
                                                        <li  class="balconies" onclick="select_list('balconies','1')"><a>1</a> </li>
                                                        <li class="balconies" class="csF bdOption" onclick="select_list('balconies','2')"><a>2</a></li>
                                                        <li class="balconies" class="csF bdOption" onclick="select_list('balconies','3')"><a>3</a></li>
                                                        <li class="balconies" class="csF bdOption" onclick="select_list('balconies','4')"><a>4</a></li>
                                                        <li class="balconies" class="csF bdOption" onclick="select_list('balconies','5')"><a>5</a></li>
                                                        <li class="balconies" class="csF bdOption" onclick="select_list('balconies','6')"><a>6</a></li>
                                                        <li class="balconies" class="csF bdOption" onclick="select_list('balconies','7')"><a>7</a></li>
                                                        <li class="balconies" class="csF bdOption" onclick="select_list('balconies','8')"><a>8</a></li>
                                                        <li class="balconies" class="csF bdOption" onclick="select_list('balconies','9')"><a>9</a></li>
                                                        <li class="btn dropdown-toggle btn_balconies-toggle balconies" type="button" data-toggle="dropdown" style="width: 55px;padding:9px">10</li>
                                                        <ul class="dropdown-menu balconies_list">
                                                            <li class="balconies" onclick="select_list('balconies','10')"><a>10</a></li>
                                                            <li class="balconies" onclick="select_list('balconies','11')"><a>11</a></li>
                                                            <li class="balconies" onclick="select_list('balconies','12')"><a>12</a></li>
                                                        </ul>
                                                    </ul>
                                                </div>
                                                <select name="balconies" id="balconies"  style="display:none;">
                                                    <option value='1' >1</option>
                                                    <option value='2' >2</option>
                                                    <option value='3' >3</option>
                                                    <option value='4' >4</option>
                                                    <option value='5' >5</option>
                                                    <option value='6' >6</option>
                                                    <option value='7' >7</option>
                                                    <option value='8' >8</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <b class="prop"> Bathroom</b><br>
                                                <div class="bedRooms listForSelect">
                                                    <ul>
                                                        <li class="bathroom" onclick="select_list('bathroom','1')"><a>1</a> </li>
                                                        <li class="bathroom" onclick="select_list('bathroom','2')"><a>2</a></li>
                                                        <li class="bathroom" onclick="select_list('bathroom','3')"><a>3</a></li>
                                                        <li class="bathroom" onclick="select_list('bathroom','4')"><a>4</a></li>
                                                        <li class="bathroom" onclick="select_list('bathroom','5')"><a>5</a> </li>
                                                        <li class="bathroom" onclick="select_list('bathroom','6')"><a>6</a></li>
                                                        <li class="bathroom" onclick="select_list('bathroom','7')"><a>7</a></li>
                                                        <li class="bathroom" onclick="select_list('bathroom','8')"><a>8</a></li>
                                                        <li class="bathroom" onclick="select_list('bathroom','9')"><a>9</a></li>
                                                        <li class="btn dropdown-toggle btn_bathroom-toggle bathroom" type="button" data-toggle="dropdown" style="width: 55px;padding:9px">10</li>
                                                        <ul class="dropdown-menu bathroom_list">
                                                            <li class="bathroom" onclick="select_list('bathroom','10')"><a>10</a></li>
                                                            <li class="bathroom" onclick="select_list('bathroom','11')"><a>11</a></li>
                                                            <li class="bathroom" onclick="select_list('bathroom','12')"><a>12</a></li>
                                                        </ul>
                                                    </ul>
                                                </div>
                                                <select  name="bathroom" id="bathroom"  style="display:none;">
                                                    <option value='1' >1</option>
                                                    <option value='2' >2</option>
                                                    <option value='3' >3</option>
                                                    <option value='4' >4</option>
                                                    <option value='5' >5</option>
                                                    <option value='6' >6</option>
                                                    <option value='7' >7</option>
                                                    <option value='8' >8</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row pt-20">
                                            <div class="col-md-12">
                                                <b class="prop">Floor No</b><br>
                                                <div class="bedRooms listForSelect">
                                                    <ul>
                                                        <li class="floor_no" onclick="select_list('floor_no','lower_basement')"><a>Lower Basemenet</a> </li>
                                                        <li class="floor_no" onclick="select_list('floor_no','upper_basement')"><a>Upper Basemenet</a> </li>
                                                        <li class="floor_no" onclick="select_list('floor_no','ground_basement')"><a>Ground Basemenet</a> </li>
                                                        <li class="floor_no" onclick="select_list('floor_no','1')"><a>1</a></li>
                                                        <li class="floor_no" onclick="select_list('floor_no','2')"><a>2</a></li>
                                                        <li class="floor_no" onclick="select_list('floor_no','3')"><a>3</a></li>
                                                        <li class="floor_no" onclick="select_list('floor_no','4')"><a>4</a></li>
                                                        <li class="floor_no" onclick="select_list('floor_no','5')"><a>5</a></li>
                                                        <li class="floor_no" onclick="select_list('floor_no','6')"><a>6</a></li>
                                                        <li class="floor_no" onclick="select_list('floor_no','7')"><a>7</a></li>
                                                        <li class="floor_no" onclick="select_list('floor_no','8')"><a>8</a></li>
                                                        <li class="floor_no" onclick="select_list('floor_no','9')"><a>9</a></li>
                                                        <li class="floor_no" onclick="select_list('floor_no','10')"><a>10</a></li>
                                                        <li class="floor_no" onclick="select_list('floor_no','11')"><a>11</a></li>
                                                        <li class="floor_no" onclick="select_list('floor_no','12')"><a>12</a></li>
                                                        <li class="floor_no" onclick="select_list('floor_no','13')"><a>13</a></li>
                                                        <li class="btn dropdown-toggle btn_floor_no-toggle floor_no" type="button" data-toggle="dropdown" style="width: 55px;padding:9px">14</li>
                                                        <ul class="dropdown-menu floor_no_list">
                                                            @for($i=5;$i<=20;$i++)
                                                        <li class="floor_no" onclick="select_list('floor_no','{{$i}}')"><a>{{$i}}</a></li>
                                                        @endfor
                                                        </ul>
                                                    </ul>
                                                </div>
                                                <select  name="floor_no" id="floor_no"  style="display:none;">
                                                    <option value='lower_basement' >lower_basement</option>
                                                    <option value='upper_basement' >upper_basement</option>
                                                    <option value='ground_basement' >ground_basement</option>
                                                    @for($i=1;$i<=20;$i++)
                                                        <option value='{{$i}}' >{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row pt-20">
                                            <div class="col-md-5">
                                                <b class="prop">Total Floors</b><br>
                                                <div class="bedRooms listForSelect">
                                                    <ul>
                                                        <li class="total_floor" onclick="select_list('total_floor','1')"><a>1</a> </li>
                                                        <li class="total_floor" onclick="select_list('total_floor','2')"><a>2</a></li>
                                                        <li class="total_floor" onclick="select_list('total_floor','3')"><a>3</a></li>
                                                        <li class="total_floor" onclick="select_list('total_floor','4')"><a>4</a></li>
                                                        <li class="total_floor" onclick="select_list('total_floor','5')"><a>5</a> </li>
                                                        <li class="total_floor" onclick="select_list('total_floor','6')"><a>6</a></li>
                                                        <li class="total_floor" onclick="select_list('total_floor','7')"><a>7</a></li>
                                                        <li class="btn dropdown-toggle btn_total_floor-toggle total_floor" type="button" data-toggle="dropdown" style="width: 55px;padding:9px">8</li>
                                                        <ul class="dropdown-menu total_floor_list">
                                                            @for($i=5;$i<=20;$i++)
                                                                <li class="total_floor" onclick="select_list('total_floor','{{$i}}')"><a>{{$i}}</a></li>
                                                            @endfor
                                                        </ul>
                                                    </ul>
                                                </div>
                                                <select  name="total_floor" id="total_floor"  style="display:none;">
                                                    @for($i=1;$i<=20;$i++)
                                                        <option value='{{$i}}' >{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-md-7">
                                                <b class="prop">Furnished Status</b><br>
                                                <div class="bedRooms listForSelect">
                                                    <ul>
                                                        <li class="furnished_status" onclick="select_list('furnished_status','furnished')"><a>Furnished</a> </li>
                                                        <li class="furnished_status" onclick="select_list('furnished_status','unfurnished')"><a>Unfurnished</a></li>
                                                        <li class="furnished_status" onclick="select_list('furnished_status','semi-unfurnished')"><a>Semi-Furnished</a></li>
                                                    </ul>
                                                </div>
                                                <select  name="furnished_status" id="furnished_status"  style="display:none;">
                                                    <option value='furnished' >furnished</option>
                                                    <option value='unfurnished' >unfurnished</option>
                                                    <option value='semi-unfurnished' >semi-unfurnished</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 h6">Property Area</h5>
                                        </div>
                                        <div class="p-2">
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label class="col-from-label">Carpet Area</label>
                                                    <input type="number" step="0.01" min="0.00" class="form-control" name="carpet_area" placeholder="Carpet Area...">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-from-label">Super Area</label>
                                                    <input type="number" step="0.01" min="0.00" class="form-control area" id="super_area" name="super_area" placeholder="Super Area...">
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
                                                    <input class="form-check-input"  type="radio" name="self_tieup" id="self" value="self">
                                                    <label class="form-check-label" for="self"> Self</label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="self_tieup" id="tieup" value="tieup">
                                                    <label class="form-check-label" for="tieup"> Tieup</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-from-label" for="plot_type">Plot Type</label>
                                                <div class="form-check">
                                                    <input class="form-check-input"  type="radio" name="plot_type" id="commercial" value="commercial">
                                                    <label class="form-check-label" for="commercial"> Commercial </label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="plot_type" id="residential" value="residential">
                                                    <label class="form-check-label" for="residential"> Residential</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="col-from-label" for="facing">Facing</label>
                                                <div class="form-check">
                                                    <input class="form-check-input"  type="radio" name="facing" id="east" value="east">
                                                    <label class="form-check-label" for="east"> East </label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="facing" id="west" value="west">
                                                    <label class="form-check-label" for="west"> West</label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="facing" id="north" value="north">
                                                    <label class="form-check-label" for="north"> North</label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="facing" id="south" value="south">
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
                                                        <label class="col-from-label">Plot Area</label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control area" name="plot_area" id="plot_area" placeholder="Plot Area...">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-from-label">Plot Length</label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control" name="plot_length" placeholder="Plot Length...">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-from-label">Plot Breadth</label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control" name="plot_breadth" placeholder="Plot Breadth...">
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
                                                    <input class="form-check-input"  type="radio" name="transaction_type" id="new" value="new" required>
                                                    <label class="form-check-label" for="new"> New Property</label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="transaction_type" id="resale" value="resale" required>
                                                    <label class="form-check-label" for="resale"> Resale</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-from-label" for="prossession_status">Possession Status <span class="text-danger">*</span></label><br>
                                                <div class="form-check">
                                                    <input class="form-check-input"  type="radio" name="prossession_status" id="under_construction" value="under_construction" required>
                                                    <label class="form-check-label" for="under_construction">Under Construction</label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="prossession_status" id="ready_to_move" value="ready_to_move" required>
                                                    <label class="form-check-label" for="ready_to_move"> Ready To Move</label>
                                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="prossession_status" id="proposed_site" value="proposed_site" required>
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
                                                <label class="col-from-label">Booking Amount</label>
                                                <input type="number" step="0.01" min="0.00" class="form-control" name="booking_amount" placeholder="Booking Amount...">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="col-from-label">Maintenance Charge</label>
                                                <input type="number" step="0.01" min="0.00" class="form-control" name="maintenance_charge" placeholder="Maintenance Charge...">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="col-from-label">Final Price <span class="text-danger">*</span></label>
                                                <input type="number" step="0.01" min="0.00" class="form-control area" name="final_price" id="final_price" placeholder="Final Price..."  required>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="col-from-label">Discounted Price <span class="text-danger">*</span></label>
                                                <input type="number" step="0.01" min="0.00" class="form-control" name="discounted_price" id="discounted_price" placeholder="Discounted Price..." required>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="col-from-label">Price per sq ft <span class="text-danger">*</span></label>
                                                <input type="number" step="0.01" min="0.00" class="form-control" name="price" id="price_per_sq_ft" placeholder="Price..." readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0 h6">Amenities</h5>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-group row">
                                            @foreach (App\Models\Admin\Amenity::orderBy('name','asc')->get() as $amenity)
                                                <div class="col-lg-3">
                                                    <label>{{$amenity->name}}</label>
                                                    <input type="checkbox" name="amenity[]" value="{{$amenity->id}}">
                                                </div>
                                            @endforeach
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
                                                <label>Gallery Image</label>
                                                <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                                    <div class="form-control file-amount">Choose Gallery Image</div>
                                                    <input type="hidden" name="gallery_image" class="selected-files">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                    </div>
                                                </div>
                                                <div class="file-preview box sm"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                                                        <div class="form-control file-amount">Choose Gallery Image</div>
                                                        <input type="hidden" name="image" class="selected-files">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                        </div>
                                                    </div>
                                                    <div class="file-preview box sm"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-20">
                                                <label class="col-from-label">Detail</label>
                                                <textarea name="remark" rows="8" class="form-control"></textarea>
                                            </div>
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
        $('#properties_type').on('change', function() {
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
        });

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

        img_input1.onchange = evt => {
            const [file] = img_input1.files
            if (file) {
                img1.src = URL.createObjectURL(file)
            }
        }

    </script>
@endsection
