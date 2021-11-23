@extends('layouts.plantilla')

@section('title', 'Reportes')

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
    
    <a href="{{url('/reportes/inscritos')}}">
        <h3>Reporte de Inscritos</h3>
    </a> 
    
    <a href="{{url('/reportes/materiales')}}">
        <h3>Reporte de Materiales</h3>
    </a>
    <h3>Cierre de Caja por Evento</h3>
        <div style="width:30%">
        <table class="table table-striped table-light" border="1">
            <thread class = "thead-light">
            <tr >
                <th>Eventos</th>
            </tr>
            </thread>
            @foreach ($t1 as $t)
                <tr>
                    <td>
                        <a href="{{url('reportes/cierredecaja/evento/' . $t->id)}}">
                            {{$t->nombre}}
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        </div>
    <h3>Cierre de Caja diario</h3>
        <div style="width:30%">
        <table class="table table-striped table-light" border="1">
            <tr>
                <th>Fechas</th>
            </tr>
                
            @foreach ($t2 as $t)
                <tr>
                    <td>
                        <a href="{{url('reportes/cierredecaja/diario/' . $t->fecha)}}">
                            {{$t->fecha}}
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        </div>
@endsection