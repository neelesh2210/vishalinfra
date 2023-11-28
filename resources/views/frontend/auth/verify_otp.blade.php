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
                                <form action="{{route('registration')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>OTP</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter OTP..." required>
                                        </div>
                                        @error('otp')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md full-width pop-login">Verify OTP</button>
                                    </div>
                                </form>
                                <div class="login-block">
                                    Already registered?
                                    <a href="{{ route('signin') }}" title="Login Now" style="font-weight: 600; color: #000;">Login Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
