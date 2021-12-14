<!-- UI02 -->
@extends('layouts.plantilla')

@section('title', 'Administrador')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/reportes/seleccion')}}">Reportes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/GestionAdministrativa/Eventos')}}">Administracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/configuracion/seleccion')}}">Configuracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/eventos/escoger/' . $t[0]->id)}}">Caja</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Asistencia</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
<h1>Perfil de {{$t[0]->nombre}} {{$t[0]->apellido}}</h1>
<h2>Correo: {{$t[0]->email}}</h2>
<div>

    <img class="img-thumbnail" width="330px" heigth="330px" src="../images/qr.png" style="">
    {{-- <h1>{{$t[0]->QR}}</h1> --}}
</div>
@endsection