<!-- UI18 -->
@extends('layouts.plantilla')

@section('title', 'Administracion')


@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #5e81ac" href="{{url('/reportes/seleccion')}}">Reportes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="{{url('/GestionAdministrativa/Eventos')}}">Administracion</a>
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
<h1>Lista de Eventos</h1>
<table class="table table-light" border = 1 width: 100% style="border-color:#c7dede; border: 1px solid #c7dede;">
    <thead class = "thead-light">
        <tr>
            <b>
            <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;"><b>Nombre</b></th>
            <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">Lugar</th>
            <th style ="width: 20%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">Fecha inicio</th>
            <th style ="width: 20%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">Fecha fin</th>
            <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;"> Administrar</th>
            </b>
        </tr>
    </thead>

    <tbody>
        @foreach ($datosEvento as $evento)    
        <tr>
            <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;"><b>{{$evento->nombre}}</b></td>
            <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$evento->lugar}}</td>
            <td style ="width: 20%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$evento->fecha_inicio}}</td>
            <td style ="width: 20%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$evento->fecha_fin}}</td>
            <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">
                <a href="{{url('/GestionAdministrativa/Eventos/'.$evento->id)}}">
                    <b>Administrar</b>
                </a> 
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<footer style="display: table;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: 18%">
    <p>© DevCode-2021 Todos los derechos reservados UCSP</p>
</footer>
@endsection