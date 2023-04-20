@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <div class="card-tools">
                                    <form action="{{route('admin.customers')}}" id="search_form">
                                        <div class="row">
                                            <div class="input-group input-group-sm mr-2 sel" style="width: 200px;">
                                                <select name="search_state" id="search_state" class="form-control float-right select2" onchange="get_city()">
                                                    <option value="">Select State...</option>
                                                    @foreach (App\Models\Admin\State::orderBy('name','asc')->get() as $state_ser)
                                                        <option value="{{$state_ser->id}}" @if($search_state == $state_ser->id) selected @endif>{{$state_ser->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group input-group-sm mr-2 sel" style="width: 200px;">
                                                <select name="search_city" id="search_city" class="form-control float-right select2" onchange="fillter()">
                                                    <option value="">Select City...</option>
                                                </select>
                                            </div>
                                            <div class="input-group input-group-sm" style="width: 200px;">
                                                <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" placeholder="Search" onkeyup="fillter()">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-2" id="table">
                                @include('admin.manage_address.pincode.table')
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($edit_pincode) Update @else Add @endisset Pincode</h5>
                            </div>
                            <form @isset($edit_pincode) action="{{ route('admin.pincodes.update',encrypt($edit_pincode->id)) }}" @else action="{{ route('admin.pincodes.store') }}" @endisset method="POST" enctype="multipart/form-data">
                                @isset($edit_pincode)
                                    @method('PUT')
                                @endisset
                                @csrf
                                <div class="card-body p-2">
                                    <div class="row">
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="country_id">Country</label>
                                                <select name="country_id" class="form-control select2" required>
                                                    <option value="">Select Country...</option>
                                                    @foreach (App\Models\Admin\Country::orderBy('name','asc')->get() as $country)
                                                        <option value="{{$country->id}}" @isset($edit_pincode) @if($country->id == $edit_pincode->country_id) selected @endif @endisset>{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="state_id">State</label>
                                                <select name="state_id" id="state_id" class="form-control select2" required onchange="get_form_city()">
                                                    <option value="">Select State...</option>
                                                    @foreach (App\Models\Admin\State::orderBy('name','asc')->get() as $state)
                                                        <option value="{{$state->id}}" @isset($edit_pincode) @if($state->id == $edit_pincode->state_id) selected @endif @endisset>{{$state->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="city_id">City</label>
                                                <select name="city_id" id="city_id" class="form-control select2" required>
                                                    <option value="">Select City...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="pincode">Pincode</label>
                                                <input type="text" class="form-control" name="pincode" @isset($edit_pincode) value="{{$edit_pincode->pincode}}" @endisset placeholder="Enter Pincode..." required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header text-center">
                                    <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Submit?');"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>

        function get_city(){
            var state_id = $('#search_state').val();
            $.ajax({
                type: 'GET',
                url: "{{route('admin.get.cities.by.state')}}?state_id="+state_id,
                success: function(data) {
                    $('#search_city').empty();
                    $('#search_city').append("<option value=''>Select City...</option>");
                    $.each(data, function(key, val) {
                        $('#search_city').append("<option value="+val.id+">"+val.name+"</option>");
                    });
                    fillter()
                }
            });
        }

        function get_form_city(){
            var state_id = $('#state_id').val();
            $.ajax({
                type: 'GET',
                url: "{{route('admin.get.cities.by.state')}}?state_id="+state_id,
                success: function(data) {
                    $('#city_id').empty();
                    $('#city_id').append("<option value=''>Select City...</option>");
                    $.each(data, function(key, val) {
                        $('#city_id').append("<option value="+val.id+">"+val.name+"</option>");
                    });
                    fillter()
                }
            });
        }

        function fillter(){
            $.ajax({
                type: 'GET',
                url: "{{route('admin.pincodes.index')}}",
                data: $('#search_form').serialize(),
                success: function(data) {
                    $('#table').html(data)
                }
            });
        }

    </script>

@endsection
