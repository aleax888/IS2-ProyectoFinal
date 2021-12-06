@extends('layouts.plantilla')

@section('title', 'preinscripcion')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('eventos/seleccion')}}">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Certificados</a>
            </li>

        </ul>
    </div> 

@endsection

@section('content')
<h1>Preinscripcion</h1>
<h3>Datos Evento</h3>
<p>{{$t[0]->nombre}}</p>
<p>{{$t[0]->lugar}}</p>
<p>{{$t[0]->fecha_inicio}}</p>
<p>{{$t[0]->fecha_fin}}</p>
    
@endsection