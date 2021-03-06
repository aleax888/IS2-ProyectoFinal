@extends('layouts.plantilla')

@section('title', 'Home')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="#">Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:#5e81ac" href="{{url('/register/form')}}">Register</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
    <div id="login" >
    <!-- <picture>
        <source srcset="logoEventure.png" type="image/svg+xml">
        <img src="logoEventure.png" class="img-fluid img-thumbnail" alt="">
    </picture> -->
    <div class="text-center" style="margin:2%" >
        <img src="..\..\public\images\logoEventure.png" width="10%" height="10%" alt="Ayuda Diosito">
    </div>
    
        <!-- <h3 class="text-center text-white pt-5">Login form</h3> -->
        <div class="container" style="background-color:#eef2f9" >
            <div id="login-row" class="row justify-content-center align-items-center" style ="margin:5%">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{url('perfil/rol')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h1 class="text-center text-info">Login</h1>
                            <div class="form-group">
                                <label for="email" class="text-info">Correo:</label><br>
                                <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" placeholder="contrase??a">
                            </div>
                            <div class="form-group" >
                                <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit" style="text-align:center">
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
 <footer style="display: table;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: 100px">
    <p>?? DevCode-2021 Todos los derechos reservados UCSP</p>
</footer>


@endsection