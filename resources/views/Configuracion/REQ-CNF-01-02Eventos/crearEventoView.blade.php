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
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/GestionAdministrativa/Eventos')}}">Administración</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="{{url('/configuracion/seleccion')}}">Configuración</a>
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
    <style>
        .big {
            background-color: #8FBCBB;
            border: none;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
            width: 150px;
        }
        label{
            display: inline-block;
            width: 140px;
            text-align: right;
        }
        p {
            background-color: #8FBCCC;
            padding: 4px 4px;
            text-align: center;
            width: 130px;
        }
    </style>

    <h1>Crear Evento</h1>
    <div>
    <form action="{{url('configuracion/crearevento')}}" method ="post" enctype="multipart/form-data">
    @csrf
        <label for="nombre"> Nombre Evento </label>
        <input type="text" name="nombre" id="nombre">
        @if ($errors->has('nombre'))
            <span class="error text-danger">{{$errors->first('nombre')}}</span>
        @endif
        <br>
        <label for="lugar"> Lugar del Evento </label>
        <input type="text" name="lugar" id="lugar">
        @if ($errors->has('lugar'))
            <span class="error text-danger">{{$errors->first('lugar')}}</span>
        @endif
        <br>
        <label for="fecha_inicio"> Fecha de Inicio </label>
        <input type="date" name="fecha_inicio" id="fecha_inicio">
        @if ($errors->has('fecha_inicio'))
            <span class="error text-danger">{{$errors->first('fecha_inicio')}}</span>
        @endif
        <br>
        <label for="fecha_fin"> Fecha de Fin </label>
        <input type="date" name="fecha_fin" id="fecha_fin">
        @if ($errors->has('fecha_fin'))
            <span class="error text-danger">{{$errors->first('fecha_fin')}}</span>
        @endif
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
    </div>
    <div>
    @if (session('mensaje'))
        <div class="ml-3">
            <p>
                {{ session('mensaje') }}
            </p>
        </div>
    @endif
    </div>
    <form>
        <button type="submit" class="big" formaction="{{url('configuracion/eventos')}}">Eventos</button>
    </form>
@endsection