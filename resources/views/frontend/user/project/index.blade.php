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
                                        <div class="foot-news-last">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search Here..">
                                                <div class="input-group-append">
                                                    <span type="button" class="input-group-text theme-bg b-0 text-light"><i class="fas fa-search"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="_prt_filt_dash_last m2_hide">
                                        <div class="_prt_filt_radius"></div>
                                        <div class="_prt_filt_add_new">
                                            <a href="{{ route('user.add.project') }}" class="prt_submit_link">
                                                <i class="fas fa-plus-circle"></i>
                                                <span class="d-none d-lg-block d-md-block">Add New Project</span>
                                            </a>
                                        </div>
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
                                                    <th scope="col" class="text-center">#</th>
                                                    <th scope="col" class="text-center">Name</th>
                                                    <th scope="col" class="text-center">Date</th>
                                                    <th scope="col" class="text-center">Project Details</th>
                                                    <th scope="col" class="text-center">Address</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($projects as $key=>$project)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$project->name}}</td>
                                                        <td>
                                                            <b>Launch : </b>{{$project->launch_date}} <br>
                                                            <b>Completion : </b> {{$project->completion_date}}
                                                        </td>
                                                        <td>
                                                            <b>Area : </b> @if($project->project_area){{$project->project_area}} Sqft. @endif <br>
                                                            <b>Units : </b> @if($project->total_unit){{$project->total_unit}} @endif
                                                        </td>
                                                        <td>{{$project->address}},
                                                            @if($project->pincode)
                                                                {{$project->city}},
                                                                {{$project->state}},
                                                                {{$project->pincode}}</td>
                                                            @endif


                                                        <td>
                                                            <div class="_leads_action">
                                                                <a href="{{route('user.edit.project',encrypt($project->id))}}"><i class="fas fa-edit"></i></a>
                                                                {{-- <a href="#"><i class="fas fa-trash"></i></a> --}}
                                                            </div>
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
