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
                                <h3>Sign In</h3><hr/>
                                <form>
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" placeholder="Enter User Name">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-with-icon">
                                            <input type="password" class="form-control" placeholder="Enter Password">
                                            <i class="ti-unlock"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="eltio_ol9">
                                            <div class="eltio_k1">
                                                <input id="dd" class="checkbox-custom" name="dd"
                                                    type="checkbox">
                                                <label for="dd" class="checkbox-custom-label">Remember Me</label>
                                            </div>
                                            <div class="eltio_k2">
                                                <a href="#">Lost Your Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                                    </div>
                                </form>
                                <div class="signup__text">
                                    New to Vishal Infra?
                                    <a href="{{route('signup')}}" class="signup__link">Sign Up</a>
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
