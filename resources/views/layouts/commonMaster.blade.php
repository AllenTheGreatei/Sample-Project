<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('jquery/jquery-3.7.1.min.js')}}"></script>
</head>
<body>
    <!-- Layout Content -->
    @yield('layoutContent')
    <!--/ Layout Content -->
   
</body>
</html>