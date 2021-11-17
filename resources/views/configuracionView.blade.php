@extends('layouts.plantilla')

@section('title', 'Configuracion')

@section('content')
    <h1>Configuracion</h1>

    <a href="{{url('configuracion/crearevento')}}">
        <h3>Crear Evento</h3>
    </a> 
    
    <h3>Adaptar Evento</h3>
    <table border="1">
        <tr>
            <th>Eventos</th>
        </tr>
                
        @foreach ($t as $t)
            <tr>
                <td>
                    {{$t->nombre}}
                </td>
                <td>
                    <a href="{{url('configuracion/adaptarevento')}}">
                        adaptar
                    </a>
                </td>
                <td>
                    <a href="{{url('configuracion/editarevento')}}">
                        editar
                    </a>
                </td>
            </tr>
        @endforeach
    </table>   
    
    <a href="{{url('/')}}">
        <h3>Nueva Actividad</h3>
    </a> 

    <a href="{{url('/')}}">
        <h3>Nuevo Ambiente</h3>
    </a> 

    <a href="{{url('/')}}">
        <h3>Nuevo Material</h3>
    </a> 

@endsection