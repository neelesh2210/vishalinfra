<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="app-url" content="{{ getBaseURL() }}">
	<meta name="file-base-url" content="{{ getFileBaseURL() }}">
    <meta charset="utf-8" />
    <meta name="author" content="Themezhub" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @isset($page_title)
            {{$page_title}}
        @else
            Reframe RealEstate
        @endisset
    </title>
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/img/favicon.png')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/image/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/image/css/aiz-core.css') }}">

    {{-- Dropzone CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/image/css/dropzone/dropzone.min.css') }}">

    <script src="{{ asset('frontend/assets/js/jquery.min.js')}}"></script>

    {{-- Dropzone JS --}}
    <script src="{{ asset('assets/image/js/dropzone/dropzone.min.js') }}"></script>
    <script>
        var AIZ = AIZ || {};
    </script>
</head>

    <body class="yellow-skin">
        <style>
            .text-danger{
                color:red;
            }
            .text-success{
                color:green;
            }
        </style>
         <div class="preloader"></div>
         <div id="main-wrapper">
            @include('frontend.layouts.header')
                @yield('content')
            @include('frontend.layouts.footer')
        </div>
    </body>
</html>
