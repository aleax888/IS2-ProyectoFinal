@extends('layouts.plantilla')

@section('title', 'crear evento')

@section('content')
    <h1>Crear Evento</h1>
    <form action="{{url('configuracion/crearevento')}}" method ="post" enctype="multipart/form-data">
    @csrf

        <label for="nombre"> Nombre Evento </label>
        <input type="text" name="nombre" id="nombreComite">
        <br>
        <label for="lugar"> Lugar del Evento </label>
        <input type="text" name="nombre" id="nombreComite">
        <br>
        <label for="fecha_inicio"> Fecha de Inicio </label>
        <input type="date" name="nombre" id="nombreComite">
        <br>
        <label for="fecha_fin"> Fecha de Fin </label>
        <input type="date" name="nombre" id="nombreComite">
        <br>
        <label for="id_tipo_evento"> Tipo del evento </label>
        <select>
            @foreach ($t as $t)
                <option value="{{$t->id}}">{{$t->nombre}}</option>
            @endforeach
        </select>
        <br>
        <input type="submit" name="guardar" id="guardar">
        <br>
        <input type="hidden" value="{{$t->id}}" name="id_tipo_evento">
        <br>

    </form>
@endsection