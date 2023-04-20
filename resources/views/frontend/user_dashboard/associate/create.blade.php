@extends('frontend.user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Add {{ucwords(request()->user_type)}}</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <form class="sdw" id="form_id">
                                    @csrf
                                    <div class="row row-20 gutters-20">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Name*</label>
                                            <input type="text" id="name" type="text" name="name" placeholder="Name*" class="form-control" required>
                                            <span id="error_name"></span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="phone" class="form-label">Phone*</label>
                                            <input class="form-control" id="phone" type="text" name="phone" placeholder="Phone*" onkeyup="sendOtp()" required>
                                            <span id="error_phone"></span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input class="form-control" id="email" type="text" name="email" placeholder="Email...">
                                            <span id="error_email"></span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="pincode" class="form-label">Pincode</label>
                                            <input class="form-control" id="pincode" type="text" name="pincode" placeholder="Pincode" onkeyup="get_address()">
                                            <span id="error_pincode"></span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="landmark" class="form-label">Landmark</label>
                                            <input class="form-control" id="landmark" type="text" name="landmark" placeholder="Landmark">
                                            <span id="error_landmark"></span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <input class="form-control" id="city" type="text" name="city" placeholder="City" readonly>
                                            <span id="error_city"></span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="state" class="form-label">State</label>
                                            <input class="form-control" id="state" type="text" name="state" placeholder="State" readonly>
                                            <span id="error_state"></span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <input class="form-control" id="country" type="text" name="country" placeholder="Country" readonly>
                                            <span id="error_country"></span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="password" class="form-label">Password*</label>
                                            <input class="form-control" id="password" type="text" name="password" placeholder="Password*" required>
                                            <span id="error_password"></span>
                                        </div>
                                        <div class="col-md-6 mb-3 d-none" id="otp_div">
                                            <label for="otp" class="form-label">OTP*</label>
                                            <input class="form-control" id="otp" type="text" name="otp" placeholder="OTP*">
                                            <span id="error_otp"></span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="referral_code" class="form-label">Referral Code</label>
                                            <input class="form-control" id="referral_code" type="text" name="referral_code" value="{{Auth::guard('web')->user()->referrer_code}}" placeholder="Referral Code" readonly>
                                            <span id="error_referral_code"></span>
                                        </div>
                                        @if(request()->user_type == 'associate')
                                            <div class="col-md-6 mb-3">
                                                <label for="aadhar_number" class="form-label">Aadhar Number</label>
                                                <input class="form-control" id="aadhar_number" type="text" name="aadhar_number" placeholder="Aadhar Number...">
                                                <span id="error_aadhar_number"></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="level" class="form-label">Level</label>
                                                <select name="level" id="level" class="form-control">
                                                    @for ($i=0;$i<=Auth::guard('web')->user()->userProfile->level;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                <span id="error_level"></span>
                                            </div>
                                        @endif
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-primary" type="button" onclick="submit_form()">Submit <i class="fa fa-chevron-circle-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

        function sendOtp(){
            var phone = $('#phone').val();
            var name = $('#name').val();
            if(phone.length == 10){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{route('send.otp')}}?phone="+phone+"&name="+name,
                    success: function(data) {
                        $('#error_phone').show();
                        $('#error_phone').addClass('text-success');
                        $('#error_phone').removeClass('text-danger');
                        $('#error_phone').text('✔ Correct');
                        $('#otp_div').removeClass('d-none');
                    },error: function (request, status, error) {
                        $(window).scrollTop(0);
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
                    }
                });
            }
        }

        function submit_form(){
            $.ajax({
                type: 'POST',
                url: "{{route('registartion')}}",
                data: $('#form_id').serialize()+"&type={{request()->user_type}}&added_by=associate",
                success: function(data) {
                    window.location.replace("{{route('user.customer.index')}}?user_type={{request()->user_type}}");
                },error: function (request, status, error) {
                    $(window).scrollTop(0);
                    if(request.responseJSON.otp == 'Wrong Otp!'){
                        $('#error_otp').show();
                        $('#error_otp').addClass('text-danger');
                        $('#error_otp').removeClass('text-success');
                        $('#error_otp').text('✖ '+request.responseJSON.otp);
                    }else{
                        console.log('no error');
                        $('#error_otp').show();
                        $('#error_otp').addClass('text-success');
                        $('#error_otp').removeClass('text-danger');
                        $('#error_otp').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.user_type){
                        $('#error_type').show();
                        $('#error_type').addClass('text-danger');
                        $('#error_type').removeClass('text-success');
                        $('#error_type').text('✖ '+request.responseJSON.errors.user_type);
                    }else{
                        $('#error_type').show();
                        $('#error_type').addClass('text-success');
                        $('#error_type').removeClass('text-danger');
                        $('#error_type').text('✔ Correct');
                    }
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
                    if(request.responseJSON.errors.aadhar_number){
                        $('#error_aadhar_number').show();
                        $('#error_aadhar_number').addClass('text-danger');
                        $('#error_aadhar_number').removeClass('text-success');
                        $('#error_aadhar_number').text('✖ '+request.responseJSON.errors.aadhar_number);
                    }
                }
            });
        }

    </script>

@endsection
