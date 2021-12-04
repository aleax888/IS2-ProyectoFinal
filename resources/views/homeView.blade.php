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
<h3>Bienvenidos XD</h3>
@endsection