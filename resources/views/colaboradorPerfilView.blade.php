<!-- UI03 -->
@extends('layouts.plantilla')

@section('title', 'Colaborador')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Certificados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('responsabilidades/seleccion/')}}">Responsabilidades</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
<h3>Perfil Colaborador</h3>
@endsection