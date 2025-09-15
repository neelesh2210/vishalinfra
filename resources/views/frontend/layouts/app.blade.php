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
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap-4.min.css')}}">

    <script src="{{ asset('frontend/assets/js/jquery.min.js')}}"></script>

    {{-- Dropzone JS --}}
    <script src="{{ asset('assets/image/js/dropzone/dropzone.min.js') }}"></script>
    <script>
        var AIZ = AIZ || {};
    </script>

    <script type="text/javascript" id="zsiqchat">
        var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "siqb9567f80ce45c0c0aec92128962140bba8ce4c7fd4db77c5a871bd434c53d152", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zohopublic.in/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);
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
             {{-- <div class="preloader">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="lds-spinner">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div> --}}
         <div id="main-wrapper">
            @include('frontend.layouts.header')
                @yield('content')
            @include('frontend.layouts.footer')
        </div>
    </body>
</html>
