@extends('frontend.layouts.app')
@section('content')
    <section>
        <div class="container">
            <!-- row Start -->
            <div class="row align-items-center">
                <div class="col-lg-9 m-auto ">
                    <div class="row resp_log_wrap m-2">
                        <div class="resp_log_thumb"
                            style="background:url({{ asset('frontend/assets/img/log.jpg') }})no-repeat;"></div>
                        <div class="resp_log_caption">
                            <div class="login-form">
                                <h3>Sign Up</h3>
                                <hr />
                                <form>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter Name" name="name">
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email ID</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter E-mail" name="email">
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" class="form-control " placeholder="Password" name="password"
                                                id="password">
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <a href=""><i class="fas fa-low-vision" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter Phone" name="phone">
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <div class="eltio_ol9">
                                                <div class="eltio_k1">
                                                    <input id="dds" class="checkbox-custom" name="dds"
                                                        type="checkbox">
                                                    <label for="dds" class="checkbox-custom-label">I agree to Vishal
                                                        Infra T&C, Privacy Policy, & Cookie Policy</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-md full-width pop-login">Register</button>
                                        </div>

                                </form>
                                <div class="login-block">
                                    Already registered?
                                    <a href="{{ route('signin') }}" title="Login Now">Login Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </section>
    <script src="{{ asset('frontend/assets/js/jquery.min.js')}}"></script>
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
    </script>
@endsection
