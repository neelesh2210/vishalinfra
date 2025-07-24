@extends('frontend.layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 m-auto ">
                    <div class="row resp_log_wrap m-2">
                        <div class="resp_log_thumb" style="background:url({{ asset('frontend/assets/img/log.jpg') }})no-repeat;"></div>
                        <div class="resp_log_caption">
                            <div class="login-form">
                                <h3>Sign Up</h3>
                                <hr/>
                                <form action="{{route('send.otp')}}" method="POST">
                                    @csrf
                                    <div class="cardss abb">
                                        <label>I am</label>
                                        <div class="input-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="type" id="buyer_owner" value="buyer_owner" @if(old('type') == 'buyer_owner') checked @else checked @endif required onchange="showHideDiv()">
                                                <label class="form-check-label" for="buyer_owner">Buyer/Owner </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="type" id="agent" value="agent" @if(old('type') == 'agent') checked @endif onchange="showHideDiv()">
                                                <label class="form-check-label" for="agent">Agent </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="type" id="builder" value="builder" @if(old('type') == 'builder') checked @endif onchange="showHideDiv()">
                                                <label class="form-check-label" for="builder">Builder </label>
                                            </div>
                                        </div>
                                        @error('type')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter Name..." required>
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email ID</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter E-mail..." required>
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Enter Phone..." required>
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                        @error('phone')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password..." required>
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <a href=""><i class="fas fa-low-vision" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group d-none" id="sponsor_div">
                                        <label>Sponsor Code</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="text" class="form-control" name="sponsor_code" id="sponsor_code" placeholder="Enter Sponsor Code..." value="{{old('sponsor_code')}}">
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <a href=""><i class="fas fa-asterisk" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @error('sponsor_code')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="eltio_ol9">
                                            <div class="eltio_k1">
                                                <input id="dds" class="checkbox-custom" name="agree" type="checkbox">
                                                <label for="dds" class="checkbox-custom-label" style="font-size: 12px;">I agree to RRE T&C, Privacy Policy, & Cookie Policy</label>
                                            </div>
                                        </div>
                                        @error('agree')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md full-width pop-login">Send OTP</button>
                                    </div>
                                </form>
                                <div class="login-block">
                                    Already registered?
                                    <a href="{{ route('signin') }}" title="Login Now" class="signup__link">Login Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fas fa-low-vision");
                    $('#show_hide_password i').removeClass("la-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fas fa-low-vision");
                    $('#show_hide_password i').addClass("fas fa-eye");
                }
            });
        });

        $(showHideDiv());

        function showHideDiv() {
            var type = document.querySelector('input[name="type"]:checked').value;
            if (type === 'agent') {
                $('#sponsor_div').removeClass('d-none');
            } else {
                $('#sponsor_div').addClass('d-none');
                $('#sponsor_div').val('');
            }
        }
    </script>
@endsection
