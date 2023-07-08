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
                        <div class="card @if($search_purchase_date || $search_expiry_date || $search_package || $search_key) @else collapsed-card @endif">
                            <div class="card-header">
                                <h3 class="card-title">Fillter</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="@if($search_purchase_date || $search_expiry_date || $search_package || $search_key) fas fa-minus @else fas fa-plus @endif"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="search_form">
                                    <div class="row">
                                        <div class="col-md-3 mb-2">
                                            <label>Purchase Date</label>
                                            <div class="input-group input-group-sm mr-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="search_purchase_date" value="{{$search_purchase_date}}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-3 mb-2">
                                            <label>Expiry Date</label>
                                            <div class="input-group input-group-sm mr-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="search_expiry_date" value="{{$search_expiry_date}}" class="form-control float-right" id="reservation1" placeholder="Select Daterange...">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-3 mb-2">
                                            <label>Package</label>
                                            <div class="input-group input-group-sm mr-2">
                                                <select class="form-control select2" name="search_package">
                                                    <option value="">Select Package</option>
                                                    @foreach (App\Models\Admin\Plan::orderby('id','asc')->get() as $plan)
                                                        <option value="{{$plan->id}}" @if($search_package == $plan->id) selected @endif>{{$plan->name}}</option>
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
                                @include('admin.purchase_plan.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
