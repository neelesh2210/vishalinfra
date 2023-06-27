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
                                                    <th scope="col">User type</th>
                                                    <th scope="col">Property</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($enquiries as $key=>$enquiry)
                                                    <tr>
                                                        <td>{{($key+1) + ($enquiries->currentPage() - 1)*$enquiries->perPage()}}</td>
                                                        <td>
                                                            @if($enquiry->user_id)
                                                                Registered User
                                                            @else
                                                                Guest User
                                                            @endif
                                                        </td>
                                                        <td>{{$enquiry->property->name}} ({{$enquiry->property->property_number}})</td>
                                                        <td>{{$enquiry->name}}</td>
                                                        <td>{{$enquiry->phone}}</td>
                                                        <td>{{$enquiry->email}}</td>
                                                        <td>{{$enquiry->created_at}}</td>
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
