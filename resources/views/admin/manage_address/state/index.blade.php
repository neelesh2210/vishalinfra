@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title) {{ $page_title }} @endisset</h5>
                                <div class="card-tools">
                                    <form action="{{route('admin.customers')}}" id="search_form">
                                        <div class="row">
                                            {{-- <div class="input-group input-group-sm mr-2 sel" style="width: 200px;">
                                                <select name="search_country" class="form-control float-right select2" onchange="fillter()">
                                                    <option value="">Select Country...</option>
                                                    @foreach (App\Models\Admin\Country::all() as $country_ser)
                                                        <option value="{{$country_ser->id}}" @if($search_country == $country_ser->id) selected @endif>{{$country_ser->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
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
                                @include('admin.manage_address.state.table')
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($edit_state) Update @else Add @endisset State</h5>
                            </div>
                            <form @isset($edit_state) action="{{ route('admin.states.update',encrypt($edit_state->id)) }}" @else action="{{ route('admin.states.store') }}" @endisset method="POST" enctype="multipart/form-data">
                                @isset($edit_state)
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
                                                        <option value="{{$country->id}}" @isset($edit_state) @if($country->id == $edit_state->country_id) selected @endif @endisset>{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" @isset($edit_state) value="{{$edit_state->name}}" @endisset placeholder="Enter Name..." required>
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

        function fillter(){
            $.ajax({
                type: 'GET',
                url: "{{route('admin.states.index')}}",
                data: $('#search_form').serialize(),
                success: function(data) {
                    $('#table').html(data)
                }
            });
        }

    </script>
    
@endsection
