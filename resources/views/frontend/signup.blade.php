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
                            <h3>Sign Up</h3><hr/>
                                <form>
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" placeholder="Enter Name">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Email ID</label>
                                        <div class="input-with-icon">
                                            <input type="email" class="form-control" placeholder="Enter E-mail">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-with-icon">
                                            <input type="password" class="form-control" placeholder="Enter Password">
                                            <i class="fas fa-unlock"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <div class="input-with-icon">
                                            <input type="password" class="form-control" placeholder="Enter 10 Digit Number">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="eltio_ol9">
                                            <div class="eltio_k1">
                                                <input id="dds" class="checkbox-custom" name="dds" type="checkbox">
                                                <label for="dds" class="checkbox-custom-label">I agree to Vishal Infra T&C, Privacy Policy, & Cookie Policy</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md full-width pop-login">Register</button>
                                    </div>

                                </form>
                                <div class="login-block">
                                    Already registered?
                                    <a href="{{route('signin')}}" title="Login Now">Login Now</a>
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
