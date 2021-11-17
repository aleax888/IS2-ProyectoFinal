<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title> 
</head>
<body style="background-color: #4C566A">
    <nav nav class="nav navbar navbar-expand-sm navbar-light" style="background-color: #2E3440;">
        <i class="fa fa-fw fa-circle" style="font-size: 30px; color: #5E81AC" ></i>
        <a class="navbar-brand mb-0 h1" style="color: #5E81AC">EVENTURE</a>
        @yield('lista')
        
    </nav>
    @yield('content')

    <script src="{{ asset(mix('js/app.js')) }}"></script>
</html>