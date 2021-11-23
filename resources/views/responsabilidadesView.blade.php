@extends('layouts.plantilla')

@section('title', 'Responsabilidades')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Certificados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="{{url('asistencia/seleccion/')}}">Responsabilidades</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
<h3>Lista de Eventos</h3>
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
                        <a href="{{url('responsabilidades/tomarAsistencia/' . $t->id)}}">
                            Tomar Asistencia
                        </a>
                    </td>
                    <td>
                        <a href="{{url('responsabilidades/materialesAmbiente')}}">
                            Entregar Materiales
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection