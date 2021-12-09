<!-- UI05 -->
@extends('layouts.plantilla')

@section('title', 'crear evento')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/reportes/seleccion')}}">Reportes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/GestionAdministrativa/Eventos')}}">Administracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="{{url('/configuracion/seleccion')}}">Configuracion</a>
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
    <h1>Crear Evento</h1>
    <form action="{{url('configuracion/crearevento')}}" method ="post" enctype="multipart/form-data">
    @csrf

        <label for="nombre"> Nombre Evento </label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="lugar"> Lugar del Evento </label>
        <input type="text" name="lugar" id="lugar">
        <br>
        <label for="fecha_inicio"> Fecha de Inicio </label>
        <input type="date" name="fecha_inicio" id="fecha_inicio">
        <br>
        <label for="fecha_fin"> Fecha de Fin </label>
        <input type="date" name="fecha_fin" id="fecha_fin">
        <br>
        <label for="id_tipo_evento"> Tipo del evento </label>
        <select name="id_tipo_evento">
            @foreach ($t as $t)
                <option value="{{$t->id}}"
                @if ($t->id == old('id_tipo_evento', $t->id))
                    selected="selected"
                @endif
                >{{$t->nombre}}</option>
            @endforeach
        </select>
        <br>
        <input type="submit" name="guardar" id="guardar">
        <br>

    </form>
@endsection