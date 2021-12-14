@extends('layouts.plantilla')

@section('title', 'Transacciones')

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
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/configuracion/seleccion')}}">Configuracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="{{url('/eventos/escoger')}}">Caja</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Asistencia</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
    <h1>Transacciones de {{$enombre[0]->nombre}}</h1>
    <a class="nav-link" href="{{url('/registrar/gasto/'.$enombre[0]->id.'/'.$id_usuario)}}">registrar gasto</a>
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
@endsection