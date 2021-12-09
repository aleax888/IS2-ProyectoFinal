<!-- UI16 -->
@extends('layouts.plantilla')

@section('title', 'Administracion')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/reportes/seleccion')}}">Reportes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="{{url('/GestionAdministrativa/Eventos')}}">Administracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/configuracion/seleccion')}}">Configuracion</a>
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
<form action="{{ url('GestionAdministrativa/CrearComite')}}" method ="post" enctype="multipart/form-data">
@csrf

    <label for="nombreComite"> Nombre </label>
    <input type="text" name="nombre" id="nombreComite">
    <br>
    <label for="NroIntegrantes"> Nro Integrantes </label>
    <input type="number" name="nro_inte" id = "NroIntegrantes">
    <br>
    <input type="submit" name="guardar" id="guardar">
    <br>
    <input type="hidden" value="{{$dataEvento->id}}" name="id_evento">
    <br>
</form>
@endsection