@extends('layouts.plantilla')

@section('title', 'Cierre de Caja por Evento')

@section('content')
    <h1>Cierre de Caja de {{$t[0]->nombre}}</h1>
    <table border="1">

    <tr>
        <th>Gastos</th>
        <th>Ingresos</th>
        <th>fecha</th>
    </tr>

    @foreach ($t as $t)
        <tr>
            <td>{{$t->gmonto}}</td>
            <td>{{$t->imonto}}</td>
            <td>{{$t->fecha}}</td>
        </tr>
    @endforeach

    </table>
@endsection