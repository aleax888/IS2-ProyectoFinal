<!-- UI14 -->
@extends('layouts.plantilla')

@section('title', 'Cierre de Caja diario')

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
<h1>Cierre de Caja {{$fecha}}</h1>

<table class="table table-striped table-light" border="1">

<tr>
    <th>Gastos</th>
    <th>Ingresos</th>
    <th>Evento</th>
</tr>

@foreach ($t as $t)
    <tr>
        <td>{{$t->gmonto}}</td>
        <td>{{$t->imonto}}</td>
        <td>{{$t->nombre}}</td>
    </tr>
@endforeach

</table>
@endsection