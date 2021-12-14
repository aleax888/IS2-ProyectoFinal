@extends('layouts.plantilla')

@section('title', 'Caja')

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
    <h1>Eventos</h1>
    <div style="width:60%">
        <table class="table table-striped table-light" border="1">
            <thread class = "thead-light">
                <tr >
                    <th>Eventos</th>
                </tr>   
            </thread>
            @foreach ($t as $t)
                <tr>
                    <td>
                        {{$t->nombre}}
                    </td>
                    <td>
                    <a class="nav-link"  href="{{url('ver/transacciones/' . $t->id . '/' . $id_usuario)}}">ver transacciones</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection