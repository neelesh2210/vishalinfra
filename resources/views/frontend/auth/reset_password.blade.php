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
                                <h3>Genrate New Password</h3>
                                <hr/>
                                <form action="#" method="POST">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" class="form-control " placeholder="New Password" name="password" id="password" required>
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <a href=""><i class="fas fa-low-vision" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <div class="input-group" id="show_hide_cpassword">
                                            <input type="password" class="form-control " placeholder="Confirm Password" name="password" id="password" required>
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <a href=""><i class="fas fa-low-vision" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md full-width pop-login">Change Password</button>
                                    </div>
                                </form>
                                <div class="signup__text">
                                   Back to
                                    <a href="{{ route('signin') }}" class="signup__link">Sign In</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
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
        $(document).ready(function() {
            $("#show_hide_cpassword a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_cpassword input').attr("type") == "text") {
                    $('#show_hide_cpassword input').attr('type', 'password');
                    $('#show_hide_cpassword i').addClass("fas fa-low-vision");
                    $('#show_hide_cpassword i').removeClass("la-eye");
                } else if ($('#show_hide_cpassword input').attr("type") == "password") {
                    $('#show_hide_cpassword input').attr('type', 'text');
                    $('#show_hide_cpassword i').removeClass("fas fa-low-vision");
                    $('#show_hide_cpassword i').addClass("fas fa-eye");
                }
            });
        });
    </script>
@endsection
