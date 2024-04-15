@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title){{ $page_title }}@endisset</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    <div class="card-header text-center">
                                        <u><h3>User Detail</h3></u>
                                    </div>
                                    <div class="card-body">
                                        <b>Type:</b> {{ucwords($property->addedBy->type)}} <br>
                                        <b>User Name:</b> {{$property->addedBy->user_name}} <br>
                                        <b>Name:</b> {{$property->addedBy->name}} <br>
                                        <b>Email:</b> {{$property->addedBy->email}} <br>
                                        <b>Phone:</b> {{$property->addedBy->phone}} <br>
                                    </div>
                                </div>
                                @if($property->project)
                                    <div class="modal-body">
                                        <div class="card-header text-center">
                                            <u><h3>Project Detail</h3></u>
                                        </div>
                                        <div class="card-body">
                                            <b>Name:</b> {{$property->project->name}} <br>
                                            <b>Address:</b> {{$property->project->address}} <br>
                                            <b>Launch Date:</b> {{$property->project->launch_date}} <br>
                                            <b>Completion Date:</b> {{$property->project->completion_date}} <br>
                                            <b>Total Unit:</b> {{$property->project->total_unit}} <br>
                                            <b>Project Type:</b> {{ucwords($property->project->project_type)}} <br>
                                            <b>Project Area:</b> {{ucwords($property->project->project_area)}} <br>
                                            <b>Aminities:</b>
                                            @if($property->project->amenities && $property->project->amenities != 'null')
                                                @foreach (json_decode($property->project->amenities) as $aminity)
                                                    {{$aminity}}/
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <div class="modal-body">
                                    <div class="card-header text-center">
                                        <u><h3>Property Detail</h3></u>
                                    </div>
                                    <div class="card-body">
                                        <b>Number:</b> {{$property->property_number}} <br>
                                        <b>Name:</b> {{$property->name}} <br>
                                        <b>Properties Type:</b> {{ucwords(str_replace('_',' ',$property->properties_type))}} <br>
                                        <b>Selling Type:</b> {{ucwords($property->property_selling_type)}} <br>
                                        <b>City:</b> {{$property->cities->name}} <br>
                                        <b>Landmark:</b> {{$property->landmark}} <br>
                                        <b>Furnished Status:</b> {{ucwords($property->furnished_status)}} <br>
                                        <b>Transaction Type:</b> {{ucwords($property->transaction_type)}} <br>
                                        <b>Prossession Status:</b> {{ucwords(str_replace('_',' ',$property->prossession_status))}} <br>
                                        <b>Bedroom:</b> {{$property->bedroom}} <br>
                                        <b>Bathroom:</b> {{$property->bathroom}} <br>
                                        <b>Balconies:</b> {{$property->balconies}} <br>
                                        <b>Floor No:</b> {{$property->floor_no}} <br>
                                        <b>Total Floor:</b> {{$property->total_floor}} <br>
                                        <b>Carpet Area:</b> {{$property->carpet_area}} <br>
                                        <b>Super Area:</b> {{$property->super_area}} <br>
                                        <b>Self/Tieup:</b> {{$property->self_tieup}} <br>
                                        <b>Plot Type:</b> {{$property->plot_type}} <br>
                                        <b>Cacing:</b> {{$property->facing}} <br>
                                        <b>Plot Area:</b> {{$property->plot_area}} <br>
                                        <b>Plot Length:</b> {{$property->plot_length}} <br>
                                        <b>Plot Breadth:</b> {{$property->plot_breadth}} <br>
                                        <b>Price:</b> {{$property->price}} <br>
                                        <b>Booking Amount:</b> {{$property->booking_amount}} <br>
                                        <b>Maintenance Charge:</b> {{$property->maintenance_charge}} <br>
                                        <b>Discounted Price:</b> {{$property->discounted_price}} <br>
                                        <b>Final Price:</b> {{$property->final_price}}
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
