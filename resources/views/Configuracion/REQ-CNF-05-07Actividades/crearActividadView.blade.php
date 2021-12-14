<!-- UI05 -->
@extends('layouts.plantilla')

@section('title', 'Crear Actividad')

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
            width: 170px;
        }
        .small {
            background-color: #8FBCCC;
            border: none;
            color: white;
            padding: 0.2px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
            width: 50px;
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

    <h1>Crear Actividad</h1>

    <form action="{{url('configuracion/crearactividad')}}" method ="post" enctype="multipart/form-data">
    @csrf
        <label for="nombre"> Nombre Actividad </label>
        <input type="text" name="nombre" id="nombre">
        @if ($errors->has('nombre'))
            <span class="error text-danger">{{$errors->first('nombre')}}</span>
        @endif
        <br>
        <label for="fecha"> Fecha </label>
        <input type="date" name="fecha" id="fecha">
        @if ($errors->has('fecha'))
            <span class="error text-danger">{{$errors->first('fecha')}}</span>
        @endif
        <br>
        <label for="hora"> Hora </label>
        <input type="time" name="hora" id="hora">
        @if ($errors->has('hora'))
            <span class="error text-danger">{{$errors->first('hora')}}</span>
        @endif        
        <br>
        <label for="id_evento"> Evento </label>
        <select name="id_evento">
            @foreach ($t1 as $evento)
                <option value="{{$evento->id}}"
                @if ($evento->id == old('id_evento', $evento->id))
                    selected="selected"
                @endif
                >{{$evento->nombre}}</option>
            @endforeach
        </select>
        <br>
        <label for="id_ambiente"> Ambiente </label>
        <select name="id_ambiente">
            @foreach ($t2 as $ambiente)
                <option value="{{$ambiente->id}}"
                @if ($ambiente->id == old('id_ambiente', $ambiente->id))
                    selected="selected"
                @endif
                >{{$ambiente->nombre}}</option>
            @endforeach
        </select>
        <br>
        <label for="id_tipo_actividad"> Tipo de la actividad </label>
        <select name="id_tipo_actividad">
            @foreach ($t as $tipo)
                <option value="{{$tipo->id}}"
                @if ($tipo->id == old('id_tipo_actividad', $tipo->id))
                    selected="selected"
                @endif
                >{{$tipo->nombre}}</option>
            @endforeach
        </select>
        <br>        
        <label for="expositor"> Expositor </label>        
        <input type="text" name="expositor" id="expositor">        
        @if ($errors->has('expositor'))
            <span class="error text-danger">{{$errors->first('expositor')}}</span>
        @endif
        <br>
        <input type="submit" name="guardar" id="guardar">
        <br>
        
    </form>
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
        <button type="submit" class="big" formaction="{{url('configuracion/actividades')}}">Actividades</button>
    </form>
@endsection