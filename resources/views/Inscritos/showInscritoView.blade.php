@extends('layouts.plantilla')

@section('title', 'Asistencia de ' . $t[0]->unombre)

@section('content')
    <h1>Asistencia a Eventos de {{$t[0]->unombre}}</h1>

    <table border="1">

        <tr>
            <th>Actividad</th>
            <th>Hora</th>
        </tr>
        
        @foreach ($t as $t)
            <tr>
                <td>{{$t->anombre}}</td>
                <td>{{$t->hora}}</td>
            </tr>
        @endforeach
    
    </table>
@endsection