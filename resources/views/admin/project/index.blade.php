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
                        <div class="card @if($search_launch_date || $search_completion_date || $search_type || $search_key) @else collapsed-card @endif">
                            <div class="card-header">
                                <h3 class="card-title">Fillter</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="@if($search_launch_date || $search_completion_date || $search_type || $search_key) fas fa-minus @else fas fa-plus @endif"></i>
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
                                                <input type="text" name="search_launch_date" value="{{$search_launch_date}}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>Completion Date</label>
                                            <div class="input-group input-group-sm mr-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="search_completion_date" value="{{$search_completion_date}}" class="form-control float-right" id="reservation1" placeholder="Select Daterange...">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label>Type</label>
                                            <select name="search_type" class="form-control select2" onchange="fillter()">
                                                <option value="">Select Type...</option>
                                                <option value="house" @if($search_type == 'house') selected @endif>House</option>
                                                <option value="apartment" @if($search_type == 'apartment') selected @endif>Apartment</option>
                                                <option value="villas" @if($search_type == 'villas') selected @endif>Villas</option>
                                                <option value="commercial" @if($search_type == 'commercial') selected @endif>Commercial</option>
                                                <option value="offices" @if($search_type == 'offices') selected @endif>Offices</option>
                                                <option value="garage" @if($search_type == 'garage') selected @endif>Garage</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2 mt-1">
                                            <label>Search</label>
                                            <div class="input-group input-group-sm">
                                            <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" placeholder="Search..." onkeyup="fillter()">
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
                                @include('admin.project.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>

        $('#reservation').on('apply.daterangepicker', function(ev, picker) {
            setTimeout(function() {
                fillter()
            }, 1000);
        });

        $('#reservation1').on('apply.daterangepicker', function(ev, picker) {
            setTimeout(function() {
                fillter()
            }, 1000);
        });

        function fillter(){
            $.ajax({
                type: 'GET',
                url: "{{route('admin.project.index')}}",
                data: $('#search_form').serialize(),
                success: function(data) {
                    $('#table').html(data)
                }
            });
        }

    </script>

@endsection
