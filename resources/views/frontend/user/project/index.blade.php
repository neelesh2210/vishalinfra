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
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Area</th>
                                                    <th scope="col">address</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($projects as $key=>$project)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$project->name}}</td>
                                                        <td>
                                                            {{$project->launch_date}} - {{$project->completion_date}}
                                                        </td>
                                                        <td>{{$project->project_area}}</td>
                                                        <td>{{$project->address}}</td>
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
