@extends('admin.layouts.app')
@section('content')
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
                        <div class="card card-outline card-primary">
                            <div class="card-body table-responsive p-2" id="table">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">User Type</th>
                                            <th class="text-center">Property</th>
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
                                                <td>
                                                    <b>Property Number:</b> {{$enquiry->property->property_number}} <br>
                                                    <b>Owner Name:</b> {{$enquiry->property->addedBy->name}} ({{$enquiry->property->addedBy->user_name}})
                                                </td>
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
