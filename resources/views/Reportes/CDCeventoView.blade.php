<!-- UI15 -->
@extends('layouts.plantilla')

@section('title', 'Cierre de Caja por Evento')

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
    <h1>Cierre de Caja de {{$t[0]->nombre}}</h1>
    <table class="table table-striped table-light" border="1" width= "100%" style="border-color:#c7dede; border: 1px solid #c7dede;">

    <tr>
        <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >Gastos</th>
        <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >Ingresos</th>
        <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >fecha</th>
    </tr>

    @foreach ($t as $t)
        <tr>
            <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >{{$t->gmonto}}</td>
            <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >{{$t->imonto}}</td>
            <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >{{$t->fecha}}</td>
        </tr>
    @endforeach

    </table>
@endsection