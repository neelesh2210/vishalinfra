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
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card @if($search_date || $search_property_type || $search_city || $search_key) @else collapsed-card @endif">
                            <div class="card-header">
                                <h3 class="card-title">Fillter</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="@if($search_date || $search_property_type || $search_city || $search_key) fas fa-minus @else fas fa-plus @endif"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="search_form">
                                    <div class="row">
                                        <div class="col-md-3 mb-2">
                                            <label>Launch Date</label>
                                            <div class="input-group input-group-sm mr-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="search_date" value="{{$search_date}}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>Type</label>
                                            <div class="input-group input-group-sm mr-2">
                                                <select class="form-control" name="search_property_type">
                                                    <option value="">Select Property Type</option>
                                                    <option value="flat_apartment" @if($search_property_type == 'flat_apartment') selected @endif>Flat/ Apartment</option>
                                                    <option value="residental_house" @if($search_property_type == 'residental_house') selected @endif>Residential House</option>
                                                    <option value="commerical_space" @if($search_property_type == 'commerical_space') selected @endif>Commercial Space</option>
                                                    <option value="plot" @if($search_property_type == 'plot') selected @endif>Plot</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>City</label>
                                            <div class="input-group input-group-sm mr-2">
                                                <select class="form-control select2" name="search_city">
                                                    <option value="">Select City</option>
                                                    @foreach (App\Models\Admin\City::whereHas('property')->get() as $city)
                                                        <option value="{{$city->id}}" @if($search_city == $city->id) selected @endif>{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2 mt-1">
                                            <label>Search</label>
                                            <div class="input-group input-group-sm">
                                            <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" placeholder="Search...">
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
                            <div class="card-body table-responsive p-2" id="table">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">User Type</th>
                                            <th class="text-center">From</th>
                                            <th class="text-center">Property/Project</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($enquiries as $key=>$enquiry)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($enquiries->currentPage() - 1)*$enquiries->perPage()}}</td>
                                                <td class="text-center">
                                                    @if($enquiry->user_id)
                                                        Registered User
                                                    @else
                                                        Guest User
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ucwords($enquiry->type)}}</td>
                                                @if($enquiry->type == 'property')
                                                    <td>
                                                        <a href="{{route('property.detail',$enquiry->property->slug)}}" target="_blank"><b>Property Number:</b> {{$enquiry->property->property_number}}<i class="fas fa-external-link-alt"></i> </a> <br>
                                                        <b>Owner Name:</b> {{$enquiry->property->addedBy->name}} ({{$enquiry->property->addedBy->user_name}})
                                                    </td>
                                                @else
                                                    <td>
                                                        <a href="{{route('project.details',$enquiry->project->id)}}" target="_blank"><b>Project Name:</b> {{$enquiry->project->name}}<i class="fas fa-external-link-alt"></i> </a> <br>
                                                        <b>Owner Name:</b> {{$enquiry->project->user->name}} ({{$enquiry->project->user->user_name}})
                                                    </td>
                                                @endif
                                                <td class="text-center">{{$enquiry->name}}</td>
                                                <td class="text-center">{{$enquiry->phone}}</td>
                                                <td class="text-center">{{$enquiry->email}}</td>
                                                <td class="text-center">{{$enquiry->created_at}}</td>
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
                                        <p><b>Showing {{($enquiries->currentpage()-1)*$enquiries->perpage()+1}} to {{(($enquiries->currentpage()-1)*$enquiries->perpage())+$enquiries->count()}} of {{$enquiries->total()}} Enquiries</b></p>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end">
                                        {!! $enquiries->links() !!}
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
