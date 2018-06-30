<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style>
        /*in order to fix login and sign up*/
        .row {
            margin-right: 0px !important;
            margin-left: 0px !important;
        }
        .navbar {
            position: relative;
            min-height: 50px;
            margin-bottom: 0px !important;
            border: 1px solid transparent;
        }
        img.profile {
            background-color: #d9d9d9;
            border-radius: 50px;
        }
        nav.margin {
            padding-top: 60px;
        }
        .navbar-fixed-top,
        .navbar-fixed-bottom {
            position: fixed; /* <-- Look here */
            right: 0;
            left: 0;
            z-index: 1030;
        }
        nav.navbar-default {
            background: -webkit-linear-gradient(left, #b3d1ff, #e6f0ff);
            background: -o-linear-gradient(right, #b3d1ff, #e6f0ff);
            background: -moz-linear-gradient(right, #b3d1ff, #e6f0ff);
            background: linear-gradient(to right, #b3d1ff, #e6f0ff);
        }
    </style>
    @yield('styles')
</head>
<body>
@include('partials.header')
<div>
    <div>
        @yield('content')
    </div>
</div>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!--script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script-->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="{{asset('js/functionality.js')}}"></script>
@yield('scripts')
</body>
</html>
