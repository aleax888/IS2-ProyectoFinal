@extends('layouts.plantilla')

@section('title', 'Reporte de Materiales')

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
    <h1>Reporte de Materiales</h1>
    <table class="table table-striped table-light" border="1">

    <tr>
        <th>Nombre Material</th>
        <th>Cantidad Adquirido</th>
        <th>Cantidad entregado</th>
        <th>Fecha</th>
    </tr>

    @foreach ($t as $t)
        <tr>
            <td>{{$t->nombre}}</td>
            <td>{{$t->cantidad}}</td>
            <td>{{$t->cantidad_material}}</td>
            <td>{{$t->fecha}}</td>
        </tr>
    @endforeach

    </table>
@endsection