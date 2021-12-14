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
                <a class="nav-link" style="color: #5e81ac" href="{{url('/GestionAdministrativa/Eventos')}}">Administracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #5e81ac" href="{{url('/configuracion/seleccion')}}">Configuracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #5e81ac" href="#">Caja</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #5e81ac" href="#">Asistencia</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
<h1>Cierre de Caja {{$fecha}}</h1>

<div style="width:60%">
    <h3>Ingresos</h3>
    <table class="table table-striped table-light" border="1">
        <thread class = "thead-light">
            <tr >
                <th>monto</th>
                <th>fecha</th>
            </tr>

        </thread>
        @foreach ($ti as $t)
            <tr>
                <td>
                    {{$t->monto}}
                </td>
                <td>
                    {{$t->fecha}}
                </td>
            </tr>
        @endforeach
    </table>
</div>
<div style="width:60%">
    <h3>Gastos</h3>
    <table class="table table-striped table-light" border="1">
        <thread class = "thead-light">
            <tr >
                <th>monto</th>
                <th>fecha</th>
                <th>descripcion</th>
                <th>Tipo</th>
            </tr>
        </thread>
        @foreach ($tg as $t)
            <tr>
                <td>
                    {{$t->monto}}
                </td>
                <td>
                    {{$t->fecha}}
                </td>
                <td>
                    {{$t->descripcion}}
                </td>
                <td>
                    {{$t->nombre}}
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{-- <table class="table table-striped table-light" border="1" width= "100%" style="border-color:#c7dede; border: 1px solid #c7dede;">

<tr>
    <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >Gastos</th>
    <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >Ingresos</th>
    <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >Evento</th>
</tr>

@foreach ($t as $t)
    <tr>
        <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >{{$t->gmonto}}</td>
        <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >{{$t->imonto}}</td>
        <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$t->nombre}}</td>
    </tr>
@endforeach

</table> --}}
@endsection