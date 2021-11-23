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
    <h1>Evento: {{$dataEvento->nombre}}</h1>
    <br>
    <td>
        <li>
            <a href="{{url('/GestionAdministrativa/ShowCrearComite/'.$dataEvento->id)}}">
                Crear Comite
            </a> 
        </li>
        <li>
            <a href="#">
                Editar Comite
            </a> 
        </li>
        <li>
            <a href="{{url('/GestionAdministrativa/GestionarRoles/' . $dataEvento->id)}}">
            Gestionar Roles
        </li>

    </td>
@endsection