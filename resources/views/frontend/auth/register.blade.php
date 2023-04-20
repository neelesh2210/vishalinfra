@extends('frontend.layouts.app')
@section('content')
    <section class="bg-gray-7">
        <div class="breadcrumbs-custom box-transform-wrap context-dark">
            <div class="container">
                <h3 class="breadcrumbs-custom-title">User Registration</h3>
                <div class="breadcrumbs-custom-decor"></div>
            </div>
            <div class="box-transform" style="background-image: url(images/background/background-7.jpg);"></div>
        </div>
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{route('index')}}">Home</a></li>
                <li class="active">Registration</li>
            </ul>
        </div>
    </section>
    <section class="section section-lg bg-default text-md-left">
        <div class="container">
            <div class="row row-60 justify-content-center">
                <div class="col-lg-6">
                    <div class="aside-contacts">
                        <img src="{{ asset('frontend/images/register.png') }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>Success!</strong> {{ $message }}
                        </div>
                    @endif

                    <form class="sdw" id="form_id">
                        @csrf
                        <div class="row row-20 gutters-20">
                            {{-- <div class="col-md-12">
                                <div class="form-wrap floating-label">
                                    <select name="type" class="form-input" required>
                                        <option value="">Select User Type...</option>
                                        <option value="customer">Customer</option>
                                        <option value="associates">Associates</option>
                                    </select>
                                    <label for="type">User Type*</label>
                                    <span id="error_type"></span>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-wrap floating-label">
                                    <input class="form-input" id="name" type="text" name="name" placeholder="Name*" required>
                                    <label for="name">Name*</label>
                                    <span id="error_name"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap floating-label">
                                    <input class="form-input" id="phone" type="text" name="phone" placeholder="Phone*" onkeyup="sendOtp()" required>
                                    <label for="phone">Phone*</label>
                                    <span id="error_phone"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap floating-label">
                                    <input class="form-input" id="email" type="text" name="email" placeholder="Email...">
                                    <label for="email">Email</label>
                                    <span id="error_email"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap floating-label">
                                    <input class="form-input" id="pincode" type="text" name="pincode" placeholder="Pincode" onkeyup="get_address()">
                                    <label for="pincode">Pincode</label>
                                    <span id="error_pincode"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap floating-label">
                                    <input class="form-input" id="landmark" type="text" name="landmark" placeholder="Landmark">
                                    <label for="landmark">Landmark</label>
                                    <span id="error_landmark"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap floating-label">
                                    <input class="form-input" id="city" type="text" name="city" placeholder="City" readonly>
                                    <label for="city">City</label>
                                    <span id="error_city"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap floating-label">
                                    <input class="form-input" id="state" type="text" name="state" placeholder="State" readonly>
                                    <label for="state">State</label>
                                    <span id="error_state"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap floating-label">
                                    <input class="form-input" id="country" type="text" name="country" placeholder="Country" readonly>
                                    <label for="country">Country</label>
                                    <span id="error_country"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap floating-label">
                                    <input class="form-input" id="password" type="text" name="password" placeholder="Password*" required>
                                    <label for="password">Password*</label>
                                    <span id="error_password"></span>
                                </div>
                            </div>
                            <div class="col-md-12 d-none" id="otp_div">
                                <div class="form-wrap floating-label">
                                    <input class="form-input" id="otp" type="text" name="otp" placeholder="OTP*">
                                    <label for="otp">OTP*</label>
                                    <span id="error_otp"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap floating-label">
                                    <input class="form-input" id="referral_code" type="text" name="referral_code" placeholder="Referral Code">
                                    <label for="referral_code">Referral Code</label>
                                    <span id="error_referral_code"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="agree-label">
                                    <input type="checkbox" name="remember" required>
                                    <label for="chb1">By signing up you agree to our terms and conditions. </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="button button-icon button-primary wow slideInUp w-100" type="button" onclick="submit_form()">Submit <i class="fa fa-chevron-circle-right"></i></button>
                                <p style="text-align:center">Already have an account? <a href="{{route('login')}}"> Log in</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

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
                data: $('#form_id').serialize()+"&type=customer",
                success: function(data) {
                    window.location.replace("{{route('user.dashboard')}}");
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
                }
            });
        }

    </script>

@endsection
