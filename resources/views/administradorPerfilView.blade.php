@extends('layouts.plantilla')

@section('title', 'Administrador')

@section('content')
    
    <a href="{{url('/reportes/seleccion')}}">
        <h3>Reportes</h3>
    </a> 

    <a href="{{url('/GestionAdministrativa/Eventos')}}">
        <h3>GestionAdministrativa</h3>
    </a> 

    <a href="{{url('/configuracion/seleccion')}}">
        <h3>Configuracion</h3>
    </a> 

    <a>
        <h3>Caja</h3>
    </a> 

    <a>
        <h3>Asistencia</h3>
    </a> 

@endsection