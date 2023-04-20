<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
    <head>
        <title>{{env('APP_NAME')}} : Home</title>
        <meta name="format-detection" content="telephone=no">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">

        {{-- <link rel="icon" href="images/favicon.ico" type="image/x-icon"> --}}
        <link rel="stylesheet" href="{{ asset('frontend/css/settings.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/custom-style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
    </head>

    <body>
        <style>
            .text-danger{
                color:red;
            }
            .text-success{
                color:green;
            }
        </style>
        <div class="preloader">
            <div class="cssload-box-loading"></div>
        </div>
        <div class="page">
            @include('frontend.layouts.header')
                @yield('content')
            @include('frontend.layouts.footer')
        </div>
    </body>
</html>
