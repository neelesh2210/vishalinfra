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
                        <div class="card card-outline card-primary">
                            <div class="card-body table-responsive p-2" id="table">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Property Detail</th>
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
                                                <td>
                                                    <b>Number: </b> {{$enquiry->property->property_number}} <br>
                                                    <b>Name: </b> {{$enquiry->property->name}} <br>
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
