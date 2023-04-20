@extends('frontend.layouts.app')
@section('content')
    <section class="bg-gray-7">
        <div class="breadcrumbs-custom box-transform-wrap context-dark">
            <div class="container">
                <h3 class="breadcrumbs-custom-title">User Login</h3>
                <div class="breadcrumbs-custom-decor"></div>
            </div>
            <div class="box-transform" style="background-image: url(images/background/background-7.jpg);"></div>
        </div>
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{route('index')}}">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div>
    </section>
    <section class="section section-lg bg-default text-md-left">
        <div class="container">
            <div class="row row-60 justify-content-center">
                <div class="col-lg-6">
                    <div class="aside-contacts">
                        <img src="{{ asset('frontend/images/login.png') }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="{{route('login')}}" method="post" class="sdw">
                        <input type="hidden" name="previous_url" value="{{$previous_url}}">
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
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                        @csrf
                        <div class="row row-20 gutters-20">
                            <div class="col-md-12">
                                <div class="form-wrap floating-label">
                                    <input class="form-input" id="phone" type="text" name="phone" placeholder="Phone*" required>
                                    <label for="phone">Phone*</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap floating-label">
                                    <input class="form-input" id="password" type="text" name="password" placeholder="Password*" required>
                                    <label for="password">Password*</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="agree-label">
                                    <input type="checkbox" name="remember">
                                    <label for="chb1">Remember Me </label>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('user.dashboard')}}" class="forget"> <i class="fa fa-lock"></i> User Dashboard</a>
                            </div>
                            <div class="col-md-12">
                                <button class="button button-icon button-primary wow slideInUp w-100" type="submit" name="submit">Submit <i class="fa fa-chevron-circle-right"></i></button>
                                <p style="text-align:center">Not registered? <a href="{{route('register')}}"> Create an account</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
