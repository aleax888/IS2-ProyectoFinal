@extends('layouts.plantilla')

@section('title', 'Home')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/login/form')}}">Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="#">Register</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')

    <div class="text-center" style="margin:2%" >
        <img src="..\..\public\images\logoEventure.png" width="10%" height="10%" alt="Ayuda Diosito">
    </div>
    <div id="login">
        <!-- <h3 class="text-center text-white pt-5">Register Form</h3> -->
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Register</h3>
                            <div class="form-group">
                                <label for="nombres" class="text-info">Nombres:</label><br>
                                <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres de usuario">
                            </div>
                            <div class="form-group">
                                <label for="apellidos" class="text-info">Apellidos:</label><br>
                                <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apelldios de usuario">
                            </div>
                            <div class="form-group">
                                <label for="correo" class="text-info">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="ejemplo@Example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <!-- <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Register here</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection