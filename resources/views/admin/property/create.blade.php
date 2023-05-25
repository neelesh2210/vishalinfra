@extends('admin.layouts.app')
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

    .current {
        background: #59a8e736;
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
        padding: 8px;
        width: fit-content;
        cursor: pointer;
        list-style: none;
        text-align: center;
    }

    .prop {
        text-transform: uppercase;
        color: #2b2e37;
        font-size: 15px;
        font-weight: 500;
    }

    .listForSelect ul li a {
        color: #606060;
        padding: 8px 15px;
        cursor: pointer;
    }

    .listForSelect ul li ol {
        color: #606060;
        border: 1px solid #e0e0e0;
        border-top: 0;
        height: 32px;
        line-height: 32px;
        width: 44px;
        text-align: center;
        background: #fff;
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
        display: block;
        display: inline-grid;
    }

    .dropdown-menu {
        border-radius: 0;
        min-width: 2rem;
        background: #fff;
    }
    .dropdown-toggle{
        border-radius: 0px;
    }
    .current {
        background: #0a69ff;
        color: #fff !important;
    }
</style>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title){{ $page_title }}@endisset</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    <form class="form form-horizontal mar-top" action="{{route('admin.property.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card"  id="property_feature"  style="display:none;">
                                            <div class="card-header">
                                                <h5 class="mb-0 h6">Property Features</h5>
                                            </div>
                                            <div class="p-2">
                                                <div class="row">
                                                    <div class="col-md-4" id="bed">
                                                        <b class="prop">Bedroom</b> <br>
                                                        <div class="bedRooms listForSelect" >
                                                            <ul>
                                                                <li class="bedroom" onclick="select_list('bedroom','1')"><a>1</a> </li>
                                                                <li class="bedroom" onclick="select_list('bedroom','2')"><a>2</a></li>
                                                                <li class="bedroom" onclick="select_list('bedroom','3')"><a>3</a></li>
                                                                <li class="bedroom" onclick="select_list('bedroom','4')"><a>4</a></li>
                                                                <li class="btn dropdown-toggle btn_bedroom-toggle bedroom" type="button" data-toggle="dropdown" style="width: 55px;">5</li>
                                                                <ul class="dropdown-menu bedroom_list">
                                                                    <li  class="bedroom" onclick="select_list('bedroom','5')"><a>5</a></li>
                                                                    <li  class="bedroom" onclick="select_list('bedroom','6')"><a>6</a></li>
                                                                    <li  class="bedroom" onclick="select_list('bedroom','7')"><a>7</a></li>
                                                                    <li  class="bedroom" onclick="select_list('bedroom','8')"><a>8</a></li>
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
                                                    <div class="col-md-4">
                                                        <b class="prop">Balconies</b><br>
                                                        <div class="bedRooms listForSelect">
                                                            <ul>
                                                                <li  class="balconies" onclick="select_list('balconies','1')"><a>1</a> </li>
                                                                <li class="balconies" class="csF bdOption" onclick="select_list('balconies','2')"><a>2</a></li>
                                                                <li class="balconies" class="csF bdOption" onclick="select_list('balconies','3')"><a>3</a></li>
                                                                <li class="balconies" class="csF bdOption" onclick="select_list('balconies','4')"><a>4</a></li>
                                                                <li class="btn dropdown-toggle btn_balconies-toggle balconies" type="button" data-toggle="dropdown" style="width: 55px;">5</li>
                                                                <ul class="dropdown-menu balconies_list">
                                                                    <li class="balconies" onclick="select_list('balconies','5')"><a>5</a></li>
                                                                    <li class="balconies" onclick="select_list('balconies','6')"><a>6</a></li>
                                                                    <li class="balconies" onclick="select_list('balconies','7')"><a>7</a></li>
                                                                    <li class="balconies" onclick="select_list('balconies','8')"><a>8</a></li>
                                                                </ul>
                                                            </ul>
                                                        </div>
                                                        <select  name="balconies" id="balconies"  style="display:none;">
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
                                                    <div class="col-md-4">
                                                        <b class="prop"> Bathroom</b><br>
                                                        <div class="bedRooms listForSelect">
                                                            <ul>
                                                                <li class="bathroom" onclick="select_list('bathroom','1')"><a>1</a> </li>
                                                                <li class="bathroom" onclick="select_list('bathroom','2')"><a>2</a></li>
                                                                <li class="bathroom" onclick="select_list('bathroom','3')"><a>3</a></li>
                                                                <li class="bathroom" onclick="select_list('bathroom','4')"><a>4</a></li>
                                                                <li class="btn dropdown-toggle btn_bathroom-toggle bathroom" type="button" data-toggle="dropdown" style="width: 55px;">5</li>
                                                                <ul class="dropdown-menu bathroom_list">
                                                                    <li class="bathroom" onclick="select_list('bathroom','5')"><a>5</a></li>
                                                                    <li class="bathroom" onclick="select_list('bathroom','6')"><a>6</a></li>
                                                                    <li class="bathroom" onclick="select_list('bathroom','7')"><a>7</a></li>
                                                                    <li class="bathroom" onclick="select_list('bathroom','8')"><a>8</a></li>
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
                                                                <li class="btn dropdown-toggle btn_floor_no-toggle floor_no" type="button" data-toggle="dropdown" style="width: 55px;">5</li>
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
                                                    <div class="col-md-6">
                                                        <b class="prop">Total Floors</b><br>
                                                        <div class="bedRooms listForSelect">
                                                            <ul>
                                                                <li class="total_floor" onclick="select_list('total_floor','1')"><a>1</a> </li>
                                                                <li class="total_floor" onclick="select_list('total_floor','2')"><a>2</a></li>
                                                                <li class="total_floor" onclick="select_list('total_floor','3')"><a>3</a></li>
                                                                <li class="total_floor" onclick="select_list('total_floor','4')"><a>4</a></li>
                                                                <li class="btn dropdown-toggle btn_total_floor-toggle total_floor" type="button" data-toggle="dropdown" style="width: 55px;">5</li>
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
                                                    <div class="col-md-6">
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
                                                    <div class="col-sm-4">
                                                        <label class="col-from-label" for="self_tieup">Self / Tieup</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input"  type="radio" name="self_tieup" id="self" value="self">
                                                            <label class="form-check-label"> Self</label>
                                                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input class="form-check-input" type="radio" name="self_tieup" id="tieup" value="tieup">
                                                            <label class="form-check-label"> Tieup</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="col-from-label" for="plot_type">Plot Type</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input"  type="radio" name="plot_type" id="commercial" value="commercial">
                                                            <label class="form-check-label"> Commercial </label>
                                                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input class="form-check-input" type="radio" name="plot_type" id="residential" value="residential">
                                                            <label class="form-check-label"> Residential</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="col-from-label" for="facing">Facing</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input"  type="radio" name="facing" id="east" value="east">
                                                            <label class="form-check-label"> East </label>
                                                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input class="form-check-input" type="radio" name="facing" id="west" value="west">
                                                            <label class="form-check-label"> West</label>
                                                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input class="form-check-input" type="radio" name="facing" id="north" value="north">
                                                            <label class="form-check-label"> North</label>
                                                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input class="form-check-input" type="radio" name="facing" id="south" value="south">
                                                            <label class="form-check-label"> South</label>
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
                                                        <label class="col-from-label" for="transaction_type">Transaction Type <span class="text-danger">*</span></label>
                                                        <div class="form-check">
                                                            <input class="form-check-input"  type="radio" name="transaction_type" id="new" value="new" required>
                                                            <label class="form-check-label"> New Property</label>
                                                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input class="form-check-input" type="radio" name="transaction_type" id="resale" value="resale" required>
                                                            <label class="form-check-label"> Resale</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-from-label" for="prossession_status">Possession Status <span class="text-danger">*</span></label>
                                                        <div class="form-check">
                                                            <input class="form-check-input"  type="radio" name="prossession_status" id="under_construction" value="under_construction" required>
                                                            <label class="form-check-label">Under Construction</label>
                                                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input class="form-check-input" type="radio" name="prossession_status" id="ready_to_move" value="ready_to_move" required>
                                                            <label class="form-check-label"> Ready To Move</label>
                                                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input class="form-check-input" type="radio" name="prossession_status" id="proposed_site" value="proposed_site" required>
                                                            <label class="form-check-label"> Proposed Site</label>
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
                                                    <div class="col-md-3">
                                                        <label class="col-from-label">Booking Amount <span class="text-danger">*</span></label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control" name="booking_amount" placeholder="Booking Amount..."  required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-from-label">Maintenance Charge <span class="text-danger">*</span></label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control" name="maintenance_charge" placeholder="Maintenance Charge..."  required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-from-label">Expected Price <span class="text-danger">*</span></label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control area" name="expected_price" id="expected_price" placeholder="Expected Price..."  required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-from-label">Price per sq ft <span class="text-danger">*</span></label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control" name="price" id="price_per_sq_ft" placeholder="Price..." readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-from-label">Token Money <span class="text-danger">*</span></label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control" name="token_money" id="token_money" placeholder="Token Money..." required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-from-label">Base Price <span class="text-danger">*</span></label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control" name="base_price" id="base_price" placeholder="Base Price..." required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-from-label">Agent Price <span class="text-danger">*</span></label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control" name="agent_price" id="agent_price" placeholder="Agent Price..." required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-from-label">Final Price <span class="text-danger">*</span></label>
                                                        <input type="number" step="0.01" min="0.00" class="form-control" name="final_price" id="final_price" placeholder="Final Price..." required>
                                                    </div>
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
                                                        <label for="attachment">Gallery Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="gallery_image[]" class="custom-file-input" accept="image/*" multiple id="gallery-photo-add" onclick="gallery_image()">
                                                            <label class="custom-file-label" for="customFile">Choose file...</label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 form-group">
                                                                <div class="gallery" id="gallery_image" style="padding-top:10px"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="image" id="img_input1" class="custom-file-input" accept="image/*">
                                                                <label class="custom-file-label" for="customFile">Choose file...</label>
                                                            </div>
                                                            <div class="p-2 mt-2">
                                                                <img id="img1" src="{{ asset('backend/img/no-image.png') }}" height="100px" width="100px">
                                                            </div>
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
            </div>
        </section>
    </div>

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
                    var expected_price  =  parseInt($('#expected_price').val());
                    var area = parseInt($('#super_area').val());
                    if(expected_price && area){
                        var price=expected_price/area;
                        $('#price_per_sq_ft').val(price);
                    }
                });
            }else if(property_type=='plot'){
                $('#property_feature').hide();
                $('#property_feature_land').show();
                $('.area').change(function(){
                    var expected_price  =  parseInt($('#expected_price').val());
                    var area = parseInt($('#plot_area').val());
                    if(expected_price && area){
                        var price=expected_price/area;
                        $('#price_per_sq_ft').val(price);
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
