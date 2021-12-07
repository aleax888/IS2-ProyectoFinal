<!DOCTYPE html>
<html lang="es">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!------ Include the above in your HEAD tag ---------->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title> 
</head>
<body style="background-color: #eef2f9">
    <nav nav class="nav navbar navbar-expand-sm navbar-light" style="background-color: #c7dede;">
        <i class="fa fa-fw fa-circle" style="font-size: 30px; color: #8fbcbb" ></i>
        <a class="navbar-brand mb-0 h1" style="color: #5e81ac">EVENTURE</a>
        @yield('lista')
        
    </nav>
    @yield('content')

    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>