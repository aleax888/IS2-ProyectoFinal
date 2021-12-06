@extends('layouts.plantilla')

@section('title', 'Home')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/login/form')}}">Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/register/form')}}">Register</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
<div style="margin:3%" >
    <h1 class="text-center">Bienvenidos a Eventure</h1>
    <div class="text-center" style="margin:2%" >
        <img src="..\..\public\images\logoEventure.png" width="50%" height="50%" alt="Ayuda Diosito">
    </div>
</div>
@endsection