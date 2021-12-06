<!-- UI21 -->
@extends('layouts.plantilla')

@section('title', 'Asistencia de ' . $t[0]->unombre)

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
    <h1>Asistencia a Eventos de {{$t[0]->unombre}}</h1>

    <table class="table table-striped table-light" border="1">

        <tr>
            <th>Actividad</th>
            <th>Hora</th>
        </tr>
        
        @foreach ($t as $t)
            <tr>
                <td>{{$t->anombre}}</td>
                <td>{{$t->hora}}</td>
            </tr>
        @endforeach
    
    </table>
@endsection