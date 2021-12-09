<!-- UI20 -->
@extends('layouts.plantilla')

@section('title', 'Reporte de Inscritos')

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
    <h1>Reporte de Inscritos</h1>
    <table class="table table-striped table-light" border="1" width= "100%" style="border-color:#c7dede; border: 1px solid #c7dede;">

        <tr>
            <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >Nombre Completo del Inscrito</th>
            <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >Nombre del Evento</th>
            <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >Tipo de Paquete</th>
            <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >Tipo de Inscrito</th>
            <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >Fecha de Inscripcion</th>
        </tr>
        
        @foreach ($t as $t)
            <tr>
                <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$t->unombre}} {{$t->apellido}}</td>
                <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$t->enombre}}</td>
                <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$t->pnombre}}</td>
                <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$t->tinombre}}</td>
                <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$t->fecha_inscripcion}}</td>
                <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">
                    <a href="{{url('reportes/inscritos/' . $t->id)}}">
                        ver asistencia
                    </a>
                </td>
                <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">
                    <a href="{{url('reportes/inscritos/QR/' . $t->id)}}">
                        ver QR
                    </a>
                </td>
            </tr>
        @endforeach
    
    </table>

@endsection