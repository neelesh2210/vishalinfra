<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{env('APP_NAME')}}</title>
        <meta name="keywords" content="{{env('APP_NAME')}}" />
        <meta name="description" content="{{env('APP_NAME')}}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('user_dashboard/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user_dashboard/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <link rel="stylesheet" href="{{asset('user_dashboard/css/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{asset('backend/css/bootstrap-4.min.css')}}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>

    <body class="loading " data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true" @if(Route::currentRouteName() == "user.course.detail")data-leftbar-compact-mode="condensed" @endif>
        @include('frontend.user_dashboard.layouts.sidebar')
        @include('frontend.user_dashboard.layouts.header')
        @yield('content')
        @include('frontend.user_dashboard.layouts.footer')


    </body>

</html>
