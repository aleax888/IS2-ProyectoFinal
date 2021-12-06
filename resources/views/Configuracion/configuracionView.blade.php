<!-- UI04 -->
@extends('layouts.plantilla')

@section('title', 'Configuracion')

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
                <a class="nav-link" style="color: #DEC692" href="{{url('/configuracion/seleccion')}}">Configuracion</a>
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
    <h1>Configuracion</h1>

    <a href="{{url('configuracion/crearevento')}}">
        <h3>Crear Evento</h3>
    </a> 
    
    <h3>Adaptar Evento</h3>
    <div style="width:50%">
    <table class="table table-striped table-light" border="1">
        <tr>
            <th>Eventos</th>
        </tr>
                
        @foreach ($t as $t)
            <tr>
                <td>
                    {{$t->nombre}}
                </td>
                <td>
                    <a href="{{url('configuracion/adaptarevento')}}">
                        adaptar
                    </a>
                </td>
                <td>
                    <a href="{{url('configuracion/editarevento')}}">
                        editar
                    </a>
                </td>
            </tr>
        @endforeach
    </table>   
    </div>
    
    <a href="#">
        <h3>Nueva Actividad</h3>
    </a> 

    <a href="#">
        <h3>Nuevo Ambiente</h3>
    </a> 

    <a href="#">
        <h3>Nuevo Material</h3>
    </a> 

@endsection