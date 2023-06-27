@extends('frontend.layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 m-auto ">
                    <div class="row resp_log_wrap m-2">
                        <div class="resp_log_thumb">
                            <img class="img-fluid" src="{{ asset('frontend/assets/img/log.jpg') }}">
                        </div>
                        <div class="resp_log_caption">
                            <div class="login-form">
                                <h3>Forgot Password</h3>
                                <hr/>
                                <form action="#" method="POST">
                                    <div class="form-group">
                                        <label>Email id</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Email id" name="user_name" required>
                                            <div class="input-group-append ">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md full-width pop-login">Send Verification Code</button>
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
@endsection
