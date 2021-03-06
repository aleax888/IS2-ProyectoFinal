<!-- UI18 -->
@extends('layouts.plantilla')

@section('title', 'Administracion')


@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/reportes/seleccion')}}">Reportes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="{{url('/GestionAdministrativa/Eventos')}}">Administracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/configuracion/seleccion')}}">Configuracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Caja</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Asistencia</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
<h1>Lista de Eventos</h1>
<div class="card-body">
<table class="table table-dark" >
    <thead>
        <tr>
            <th>Nombre</th>
            <th>lugar</th>
            <th>Fecha inicio</th>
            <th>Fecha fin</th>
            <th> Administrar</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($datosEvento as $evento)    
        <tr>
            <td>{{$evento->nombre}}</td>
            <td>{{$evento->lugar}}</td>
            <td>{{$evento->fecha_inicio}}</td>
            <td>{{$evento->fecha_fin}}</td>
            {{-- <td>
                <a href="{{url('/GestionAdministrativa/Evento/'.$evento->id)}}">
                    Administrar
                </a> 
            </td> --}}
            <td ><a class="btn btn-info text-red" href="{{url('/GestionAdministrativa/Evento/'.$evento->id)}}">Administrar</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection