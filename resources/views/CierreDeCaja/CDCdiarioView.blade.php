@extends('layouts.plantilla')

@section('title', 'Cierre de Caja diario')

@section('content')
    <h1>Cierre de Caja {{$t[0]->fecha}}</h1>

    <table border="1">

    <tr>
        <th>Gastos</th>
        <th>Ingresos</th>
        <th>Evento</th>
    </tr>
    
    @foreach ($t as $t)
        <tr>
            <td>{{$t->gmonto}}</td>
            <td>{{$t->imonto}}</td>
            <td>{{$t->nombre}}</td>
        </tr>
    @endforeach

    </table>
@endsection