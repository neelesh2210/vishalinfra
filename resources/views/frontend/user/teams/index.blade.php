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
                                <div class="dashboard_property">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">User Code</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($teams as $key=>$team)
                                                    <tr>
                                                        <td>{{($key+1) + ($teams->currentPage() - 1)*$teams->perPage()}}</td>
                                                        <td>{{$team->user_name}}</td>
                                                        <td>{{$team->name}}</td>
                                                        <td>{{$team->phone}}</td>
                                                        <td>{{$team->email}}</td>
                                                        <td>{{$team->created_at}}</td>
                                                    </tr>
                                                @endforeach
                                            <tbody>
                                        </table>
                                        <div class="d-flex justify-content-center">
                                            {!! $teams->links() !!}
                                        </div>
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
