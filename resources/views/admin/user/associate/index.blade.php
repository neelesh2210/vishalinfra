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
                    <div class="col-sm-6">
                        <a href="{{route('admin.add.associate')}}" class="btn btn-primary float-right">Add Associate <i class="fas fa-plus"></i></a>
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
                                <div class="card-tools">
                                    <form action="{{route('admin.customers')}}" id="search_form">
                                        <div class="row">
                                            <div class="input-group input-group-sm mr-2" style="width: 200px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="search_date" value="{{$search_date}}" class="form-control float-right" id="reservation" placeholder="Select Daterange...">
                                            </div>
                                            <div class="input-group input-group-sm mr-2" style="width: 200px;">
                                                <select name="search_verify_status" class="form-control float-right" onchange="fillter()">
                                                    <option value="">Select Verify Status...</option>
                                                    <option value="0" @if($search_verify_status == '0') selected @endif>Not Verified</option>
                                                    <option value="1" @if($search_verify_status == '1') selected @endif>Verified</option>
                                                </select>
                                            </div>
                                            <div class="input-group input-group-sm mr-2" style="width: 200px;">
                                                <select name="search_kyc_status" class="form-control float-right" onchange="fillter()">
                                                    <option value="">Select KYC Status...</option>
                                                    <option value="0" @if($search_kyc_status == '0') selected @endif>Not Verified</option>
                                                    <option value="1" @if($search_kyc_status == '1') selected @endif>Verified</option>
                                                </select>
                                            </div>
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
                                @include('admin.user.associate.table')
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

        function changeVerifyStatus(user_id,verify_status){
            if(verify_status == '0'){
                var confirm_text = 'Are you sure you want to Not Verified this Customer?';
            }else{
                var confirm_text = 'Are you sure you want to Verified this Customer?';
            }
            if(confirm(confirm_text) == true){
                $.ajax({
                    type: 'GET',
                    url: "{{route('admin.verifiy.status')}}?user_id="+user_id+"&verify_status="+verify_status,
                    success: function(data) {
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            icon: 'success',
                            title: 'Status Changed Successfully!'
                        })
                        fillter()
                    }
                });
            }
        }

        function changeKycStatus(user_id,kyc_status){
            if(kyc_status == '0'){
                var confirm_text = 'Are you sure you want to Not Verified this Customer?';
            }else{
                var confirm_text = 'Are you sure you want to Verified this Customer?';
            }
            if(confirm(confirm_text) == true){
                $.ajax({
                    type: 'GET',
                    url: "{{route('admin.kyc.status')}}?user_id="+user_id+"&kyc_status="+kyc_status,
                    success: function(data) {
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            icon: 'success',
                            title: 'Status Changed Successfully!'
                        })
                        fillter()
                    }
                });
            }
        }

        function fillter(){
            $.ajax({
                type: 'GET',
                url: "{{route('admin.associates')}}",
                data: $('#search_form').serialize(),
                success: function(data) {
                    $('#table').html(data)
                }
            });
        }
    </script>
@endsection
