<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">

        <meta name="format-detection" content="telephone=no">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="santaichinh24h">

        <meta name="keywords" content="santaichinh24h">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- css -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <link href="{{ asset('css/boostrap.min.css') }}" rel="stylesheet">

        <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet"> 

        <link href="{{ asset('css/weather-icons.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/demo.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/typicons.min.css') }}" rel="stylesheet">
        
        <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/superweb-custom.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('js/cute-alert-master/style.css')}}" />

        <script src="{{asset('js/cute-alert-master/cute-alert.js')}}"></script>
        <!--Fonts-->
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300"
            rel="stylesheet" type="text/css">

        <!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> -->

        <link rel="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/flexslider.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

        <script  type="text/javascript" src="{{ asset('js/api.js') }}"></script>

        <script  type="text/javascript" src="{{ asset('js/cpanel.js') }}"></script>
        
    </head>
    <body>
        <input type="hidden" class="_token" name="_token" value="{{ csrf_token() }}" />
        @yield('content')
    </body>
    <script>
        profile();
        token != null ? window.location.href = linkCpanel : "";
    </script>
</html>