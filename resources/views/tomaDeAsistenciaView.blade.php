@extends('layouts.plantilla')

@section('title', 'TomadeAsistencia')

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
<h3>Lista de Inscritos en: {{$t[0]->evento}}</h3>
    <div style="width:30%">
        <table class="table table-striped table-light" border="1">
            <thread class = "thead-light">
                <tr >
                    <th>Inscritos</th>
                    <th>Asistencia</th>
                    <th>Material</th>
                </tr>
            </thread>
            @foreach ($t as $t)
                <tr>
                    <td>
                        {{$t->unombre}} {{$t->apellido}}
                    </td>
                    <td>
                        <input type="checkbox" name="" id = "" value="">
                        <label for="html">presente</label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="" id = "" value="">
                        <label for="html">entregado</label><br>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection