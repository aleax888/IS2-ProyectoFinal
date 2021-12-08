@extends('layouts.plantilla')

@section('title', 'Home')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #5e81ac" href="{{url('/login/form')}}">Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #5e81ac" href="{{url('/register/form')}}">Register</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
<div class = "contenedor" style = " align: center; background-color:#eef2f9" >
<div style= "margin:5%">
    <h1 class="text-center"style= "color:#5e81ac; font-size:500" >BIENVENIDOS A EVENTURE</h1>
    <div class="text-center" style="margin:2%" >
        <img src="..\..\public\images\logoEventure.png" width="37%" height="37%" alt="Ayuda Diosito">
    </div>
</div>
</div>

<footer style="display: table;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: 100px">
    <p>© DevCode-2021 Todos los derechos reservados UCSP</p>
</footer>
@endsection




