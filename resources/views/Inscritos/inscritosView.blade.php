@extends('layouts.plantilla')

@section('title', 'Reporte de Inscritos')

@section('content')
    <h1>Reporte de Inscritos</h1>
    <table border="1">

        <tr>
            <th>Nombre Completo</th>
            <th>Tipo de Paquete</th>
            <th>Tipo de Inscrito</th>
            <th>Fecha de Inscripcion</th>
        </tr>
        
        @foreach ($t as $t)
            <tr>
                <td>{{$t->unombre}}</td>
                <td>{{$t->pnombre}}</td>
                <td>{{$t->tipos_inscrito}}</td>
                <td>{{$t->createdfecha_inscripcion}}</td>
            </tr>
        @endforeach
    
    </table>

@endsection