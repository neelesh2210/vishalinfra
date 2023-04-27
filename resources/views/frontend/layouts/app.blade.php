<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="Themezhub" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vishal Infra</title>
    <!-- Custom CSS -->
    <link href="{{ asset('frontend/assets/css/styles.css')}}" rel="stylesheet">
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
