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
                            <div class="card-header">
                                <form id="search_form">
                                    <div class="row">
                                        <div class="col-md-3 mb-2"></div>
                                        <div class="col-md-4 mb-2">
                                            <label>Date</label>
                                            <div class="input-group input-group-sm mr-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="search_date" value="{{$search_date}}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
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
                                        {{-- <div class="col-md-1 mb-2 mt-4 text-right">
                                            <button type="submit" name="export" value="export" class="btn btn-default">
                                                Export
                                            </button>
                                        </div> --}}
                                    </div>
                                </form>
                            </div>
                            <div class="card-body table-responsive p-2" id="table">
                                @include('admin.payout.success_table')
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

        function fillter(){
            $('tbody').addClass('loading')
            $.ajax({
                type: 'GET',
                url: "{{route('admin.payout.success.index')}}",
                data: $('#search_form').serialize(),
                success: function(data) {
                    $('tbody').removeClass('loading')
                    $('#table').html(data)
                }
            });
        }

    </script>

@endsection
