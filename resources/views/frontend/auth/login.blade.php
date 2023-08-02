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
                                <h3>Sign In</h3>
                                <hr/>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">*{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li class="text-danger">{{ $message }}</li>
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{route('login')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="User Name" name="user_name" required>
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" class="form-control " placeholder="Password" name="password" id="password" required>
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <a href=""><i class="fas fa-low-vision" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="eltio_ol9 d-flex justify-content-center">
                                            <div class="eltio_k2">
                                                <a href="{{ route('forgot_password') }}">Lost Your Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                                    </div>
                                </form>
                                <div class="signup__text">
                                    New to Reframe Realestate?
                                    <a href="{{ route('signup') }}" class="signup__link">Sign Up</a>
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
    </script>
@endsection
