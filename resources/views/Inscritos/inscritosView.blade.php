@extends('layouts.plantilla')

@section('title', 'Reporte de Inscritos')

@section('content')
    <h1>Reporte de Inscritos</h1>
    <table border="1">

        <tr>
            <th>Nombre Completo del Inscrito</th>
            <th>Nombre del Evento</th>
            <th>Tipo de Paquete</th>
            <th>Tipo de Inscrito</th>
            <th>Fecha de Inscripcion</th>
        </tr>
        
        @foreach ($t as $t)
            <tr>
                <td>{{$t->unombre}} {{$t->apellido}}</td>
                <td>{{$t->enombre}}</td>
                <td>{{$t->pnombre}}</td>
                <td>{{$t->tinombre}}</td>
                <td>{{$t->fecha_inscripcion}}</td>
                <td>
                    <a href="{{url('reportes/inscritos/' . $t->id)}}">
                        ver asistencia
                    </a>
                </td>
                <td>
                    <a href="{{url('reportes/inscritos/QR/' . $t->id)}}">
                        ver QR
                    </a>
                </td>
            </tr>
        @endforeach
    
    </table>

@endsection