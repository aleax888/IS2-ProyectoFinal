<!-- UI09 -->
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
    <table class="table table-striped table-light" border="1" width= "100%" style="border-color:#c7dede; border: 1px solid #c7dede;">

    <tr>
        <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">Nombre Material</th>
        <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">Cantidad Adquirido</th>
        <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">Cantidad entregado</th>
        <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">Fecha</th>
    </tr>

    @foreach ($t as $t)
        <tr>
            <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$t->nombre}}</td>
            <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$t->cantidad}}</td>
            <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$t->cantidad_material}}</td>
            <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$t->fecha}}</td>
        </tr>
    @endforeach

    </table>
@endsection