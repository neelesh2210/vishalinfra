@extends('admin.layouts.app')
@section('content')
<style>
    .lbl_msg {
        padding-top: 2px;
        font-size: 13px !important;
    }
</style>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title){{ $page_title }}@endisset
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    <form class="form-example" id="form_id">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name..." required>
                                                </div>
                                                <span id="error_name" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="phone">Phone <span class="text-danger">*</span> </label>
                                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone..." required>
                                                </div>
                                                <span id="error_phone" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email...">
                                                </div>
                                                <span id="error_email" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="pincode">Pincode</label>
                                                    <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode..." onkeyup="get_address()">
                                                </div>
                                                <span id="error_pincode" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="landmark">Landmark</label>
                                                    <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Enter Landmark...">
                                                </div>
                                                <span id="error_landmark" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City..." readonly>
                                                </div>
                                                <span id="error_city" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter State..." readonly>
                                                </div>
                                                <span id="error_state" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country..." readonly>
                                                </div>
                                                <span id="error_country" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password...">
                                                </div>
                                                <span id="error_country" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="referral_code">Referral Code</label>
                                                    <input type="text" class="form-control" id="referral_code" name="referral_code" placeholder="Enter Referral Code...">
                                                </div>
                                                <span id="error_referral_code" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="level">Level</label>
                                                    <select name="level" id="level" class="form-control">
                                                        @for ($i=0;$i<=12;$i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <span id="error_level" class="lbl_msg"></span>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-outline-success" onclick="submit_form()">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>

        function get_address(){
            var pincode = $('#pincode').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{route('get.address')}}?pincode="+pincode,
                success: function(data) {
                    if(data != ''){
                        $('#country').val(data.country.name);
                        $('#state').val(data.state.name);
                        $('#city').val(data.city.name);
                    }else{
                        $('#country').val('');
                        $('#state').val('');
                        $('#city').val('');
                    }
                }
            });
        }

        function submit_form(){
            $.ajax({
                type: 'POST',
                url: "{{route('admin.save.associate')}}",
                data: $('#form_id').serialize()+"&type=associate",
                success: function(data) {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        icon: 'success',
                        title: 'Associate Added Successfully!'
                    })
                    window.location.replace("{{route('admin.associates')}}");
                },error: function (request, status, error) {
                    $(window).scrollTop(0);
                    if(request.responseJSON.errors.name){
                        $('#error_name').show();
                        $('#error_name').addClass('text-danger');
                        $('#error_name').removeClass('text-success');
                        $('#error_name').text('✖ '+request.responseJSON.errors.name);
                    }else{
                        $('#error_name').show();
                        $('#error_name').addClass('text-success');
                        $('#error_name').removeClass('text-danger');
                        $('#error_name').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.phone){
                        $('#error_phone').show();
                        $('#error_phone').addClass('text-danger');
                        $('#error_phone').removeClass('text-success');
                        $('#error_phone').text('✖ '+request.responseJSON.errors.phone);
                    }else{
                        $('#error_phone').show();
                        $('#error_phone').addClass('text-success');
                        $('#error_phone').removeClass('text-danger');
                        $('#error_phone').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.email){
                        $('#error_email').show();
                        $('#error_email').addClass('text-danger');
                        $('#error_email').removeClass('text-success');
                        $('#error_email').text('✖ '+request.responseJSON.errors.email);
                    }else{
                        if($('#email').val() != ''){
                            $('#error_email').show();
                            $('#error_email').addClass('text-success');
                            $('#error_email').removeClass('text-danger');
                            $('#error_email').text('✔ Correct');
                        }
                    }
                    if(request.responseJSON.errors.pincode){
                        $('#error_pincode').show();
                        $('#error_pincode').addClass('text-danger');
                        $('#error_pincode').removeClass('text-success');
                        $('#error_pincode').text('✖ '+request.responseJSON.errors.pincode);
                    }else{
                        if($('#pincode').val() != ''){
                            $('#error_pincode').show();
                            $('#error_pincode').addClass('text-success');
                            $('#error_pincode').removeClass('text-danger');
                            $('#error_pincode').text('✔ Correct');
                        }
                    }
                    if(request.responseJSON.errors.password){
                        $('#error_password').show();
                        $('#error_password').addClass('text-danger');
                        $('#error_password').removeClass('text-success');
                        $('#error_password').text('✖ '+request.responseJSON.errors.password);
                    }else{
                        $('#error_password').show();
                        $('#error_password').addClass('text-success');
                        $('#error_password').removeClass('text-danger');
                        $('#error_password').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.referral_code){
                        $('#error_referral_code').show();
                        $('#error_referral_code').addClass('text-danger');
                        $('#error_referral_code').removeClass('text-success');
                        $('#error_referral_code').text('✖ '+request.responseJSON.errors.referral_code);
                    }else{
                        if($('#referral_code').val() != ''){
                            $('#error_referral_code').show();
                            $('#error_referral_code').addClass('text-success');
                            $('#error_referral_code').removeClass('text-danger');
                            $('#error_referral_code').text('✔ Correct');
                        }
                    }
                }
            });
        }
    </script>

@endsection
