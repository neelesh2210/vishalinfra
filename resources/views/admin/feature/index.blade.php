@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title) {{ $page_title }} @endisset</h5>
                                <div class="card-tools">
                                    <form action="{{route('admin.feature.index')}}" id="search_form">
                                        <div class="row">
                                            <div class="input-group input-group-sm" style="width: 200px;">
                                                <input type="text" name="search_key" value="{{$search_key}}" class="form-control float-right" placeholder="Search" onkeyup="fillter()">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-2" id="table">
                                @include('admin.feature.table')
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($edit_feature) Update @else Add @endisset Feature</h5>
                            </div>
                            <form @isset($edit_feature) action="{{ route('admin.feature.update',$edit_feature->id) }}" @else action="{{ route('admin.feature.store') }}" @endisset method="POST" enctype="multipart/form-data">
                                @isset($edit_feature)
                                    @method('PUT')
                                @endisset
                                @csrf
                                <div class="card-body p-2">
                                    <div class="row">
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" @isset($edit_feature) value="{{$edit_feature->name}}" @endisset placeholder="Enter Name..." required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header text-center">
                                    <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Submit?');"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>

        function fillter(){
            $.ajax({
                type: 'GET',
                url: "{{route('admin.feature.index')}}",
                data: $('#search_form').serialize(),
                success: function(data) {
                    $('#table').html(data)
                }
            });
        }

    </script>

@endsection
