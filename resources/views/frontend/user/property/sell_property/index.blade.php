@extends('frontend.layouts.app')
@section('content')
    <section class="gray pt-5 pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    @include('frontend.include.sidebar')
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="dashboard-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="_prt_filt_dash">
                                    <div class="_prt_filt_dash_flex">
                                            <form>
                                                <div class="row justify-content-end">
                                                    <div class="col-md-3">
                                                        <select name="search_status" class="form-control" data-toggle="select2" onchange="fillter()">
                                                            <option value="">Select Status...</option>
                                                            <option value="available" @if($search_status == 'available') selected @endif>Available</option>
                                                            <option value="on_hold" @if($search_status == 'on_hold') selected @endif>On Hold</option>
                                                            <option value="reserved" @if($search_status == 'reserved') selected @endif>Reserved</option>
                                                            <option value="booked" @if($search_status == 'booked') selected @endif>Booked</option>
                                                            <option value="registred" @if($search_status == 'registred') selected @endif>Registred</option>
                                                            <option value="sold" @if($search_status == 'sold') selected @endif>Sold</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="search_key" value="{{$search_key}}" placeholder="Search Here..">
                                                            <div class="input-group-append">
                                                                <button type="submit" class="input-group-text theme-bg b-0 text-light"><i class="fas fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="dashboard_property">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Project</th>
                                                    <th scope="col">Property</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($properties as $key=>$property)
                                                    <tr>
                                                        <td>
                                                            <div class="dash_prt_wrap">
                                                                <div class="dash_prt_caption">
                                                                    <h5>{{$property->project->name}}</h5>
                                                                    <div class="prt_dash_rate"><span>{{ ucfirst($property->project->project_type) }}</span></div>
                                                                    <div class="prt_dashb_lot">{{$property->project->address}}</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="dash_prt_wrap">
                                                                <div class="dash_prt_thumb">
                                                                    <img src="{{ uploaded_asset($property->thumbnail_img) }}" class="img-fluid" onerror="this.onerror=null;this.src='{{asset('backend/img/property_default.jpg')}}';">
                                                                </div>
                                                                <div class="dash_prt_caption">
                                                                    <h5>{{ $property->name }}</h5>
                                                                    <div class="prt_dash_rate"><span>{{ ucwords(str_replace('_', ' ', $property->properties_type)) }}</span></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="m2_hide">
                                                            <b>Price: </b> {{$property->final_price}} <br>
                                                            <b>Sqft Price: </b> {{$property->price}}/sqft
                                                        </td>
                                                        <td>
                                                            <div class="_leads_status">

                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if($property->booking_status != 'sold')
                                                                @if($property->bookProperty?->booking_status != 'emi')
                                                                        @if ($property->booking_status != 'available')
                                                                            @if($property->bookProperty?->booked_by == Auth::guard('web')->user()->id)
                                                                            <a href="{{route('user.sell.property.detail',encrypt($property->id))}}" class="btn btn-primary">
                                                                                Pay
                                                                            </a>
                                                                            @endif
                                                                        @else
                                                                        <a href="{{route('user.sell.property.detail',encrypt($property->id))}}" class="btn btn-primary">
                                                                            Book
                                                                        </a>
                                                                        @endif
                                                                @else
                                                                    Emi
                                                                @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            <tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
