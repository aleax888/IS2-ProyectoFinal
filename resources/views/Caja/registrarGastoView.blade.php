@extends('layouts.plantilla')

@section('title', 'registrar gasto')

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
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/eventos/escoger')}}">Caja</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Asistencia</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
    <h1>Registrar gasto</h1>
    <form action="{{url('registrar/gasto/'.$id_evento.'/'. $id_usuario)}}" method ="post" enctype="multipart/form-data">
    @csrf

        <label for="fecha"> fecha </label>
        <input type="date" name="fecha" id="fecha">
        <br>
        <label for="descripcion"> descripcion </label>
        <input type="text" name="descripcion" id="descripcion">
        <br>
        <label for="monto"> monto </label>
        <input type="number" name="monto" id="monto">
        <br>
        <label for="evidencia"> evidencia </label>
        <input type="text" name="evidencia" id="evidencia">
        <br>
        <label for="id_tg"> Tipo </label>
        <select name="id_tg">
            @foreach ($t as $t)
                <option value="{{$t->id}}">{{$t->nombre}}</option>
            @endforeach
        </select>
        <br>
        <input type="submit" name="guardar" id="guardar">
        <br>

    </form>
@endsection