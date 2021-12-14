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
                <a class="nav-link" style="color: #8FBCBB" href="{{url('responsabilidades/seleccion/'.$t[0]->id)}}">Responsabilidades</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
<h1>Perfil de {{$t[0]->nombre}} {{$t[0]->apellido}}</h1>
<h2>Correo: {{$t[0]->email}}</h2>
<div>

    <h1>{{$t[0]->QR}}</h1>
</div>
@endsection