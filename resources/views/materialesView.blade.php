@extends('layouts.plantilla')

@section('title', 'Reporte de Materiales')

@section('content')
    <h1>Reporte de Materiales</h1>
    <table border="1">

    <tr>
        <th>Nombre Material</th>
        <th>Cantidad Adquirido</th>
        <th>Cantidad entregado</th>
        <th>Fecha</th>
    </tr>

    @foreach ($t as $t)
        <tr>
            <td>{{$t->nombre}}</td>
            <td>{{$t->cantidad}}</td>
            <td>{{$t->material}}</td>
            <td>{{$t->hora}}</td>
        </tr>
    @endforeach

    </table>
@endsection