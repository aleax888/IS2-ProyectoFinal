@extends('layouts.plantilla')

@section('title', 'Reporte de Inscritos')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="{{url('/reportes/seleccion')}}">Reportes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/GestionAdministrativa/Eventos')}}">Administracion</a>
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
    <h1>Reporte de Inscritos</h1>
    <table class="table table-striped table-light" border="1">

        <tr>
            <th>Nombre Completo del Inscrito</th>
            <th>Nombre del Evento</th>
            <th>Tipo de Paquete</th>
            <th>Tipo de Inscrito</th>
            <th>Fecha de Inscripcion</th>
        </tr>
        
        @foreach ($t as $t)
            <tr>
                <td>{{$t->unombre}} {{$t->apellido}}</td>
                <td>{{$t->enombre}}</td>
                <td>{{$t->pnombre}}</td>
                <td>{{$t->tinombre}}</td>
                <td>{{$t->fecha_inscripcion}}</td>
                <td>
                    <a href="{{url('reportes/inscritos/' . $t->id)}}">
                        ver asistencia
                    </a>
                </td>
                <td>
                    <a href="{{url('reportes/inscritos/QR/' . $t->id)}}">
                        ver QR
                    </a>
                </td>
            </tr>
        @endforeach
    
    </table>

@endsection