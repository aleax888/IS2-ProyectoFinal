<!-- UI06 -->
@extends('layouts.plantilla')

@section('title', 'Editar actividad')

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
            margin: 0 10px 0 10px;
        }
        p {
            background-color: #8FBCCC;
            padding: 4px 4px;
            text-align: center;
            width: 150px;
        }
    </style>

    <h1>Editar Actividad</h1>

    <div style="width:50%">
    <table class="table table-striped table-light" border="1">  
    @foreach ($t as $actividad) 
    <h2 style="color: #8FBCBB">{{$actividad->nombre}}</h2>
    <form action="{{url('configuracion/editaractividad/'. $id)}}" method ="post" enctype="multipart/form-data">
    @csrf
        <label for="nombre"> Nombre Evento </label>
        <input type="text" name="nombre" value="{{$actividad->nombre}}" id="nombre">
        @if ($errors->has('nombre'))
            <span class="error text-danger">{{$errors->first('nombre')}}</span>
        @endif
        <br>
        <label for="fecha"> Fecha </label>
        <input type="date" name="fecha" value="{{$actividad->fecha}}" id="fecha">
        @if ($errors->has('fecha'))
            <span class="error text-danger">{{$errors->first('fecha')}}</span>
        @endif
        <br>
        <label for="hora"> Hora </label>
        <input type="time" name="hora" value="{{$actividad->hora}}" id="hora">
        @if ($errors->has('hora'))
            <span class="error text-danger">{{$errors->first('hora')}}</span>
        @endif
        <br>
        <label for="id_evento"> Evento </label>
        <select name="id_evento">
            @foreach ($t5 as $eventos)
                <option value="{{$eventos->id}}"
                @foreach ($t1 as $evento)
                    @if ($evento->id == $eventos->id)
                        selected="selected"
                    @endif
                @endforeach
                >{{$eventos->nombre}}
                </option>
            @endforeach
        </select>
        <br>
        <label for="id_ambiente"> Ambiente </label>
        <select name="id_ambiente">
            @foreach ($t6 as $ambientes)
                <option value="{{$ambientes->id}}"
                @foreach ($t2 as $ambiente)
                    @if ($ambiente->id == $ambientes->id)
                        selected="selected"
                    @endif
                @endforeach
                >{{$ambientes->nombre}}
                </option>
            @endforeach
        </select>
        <br>
        <label for="id_tipo_actividad"> Tipo de la actividad </label>
        <select name="id_tipo_actividad">
            @foreach ($t4 as $tipos)
                <option value="{{$tipos->id}}"
                @foreach ($t3 as $tipo)
                    @if ($tipo->id == $tipos->id)
                        selected="selected"
                    @endif
                @endforeach
                >{{$tipos->nombre}}
                </option>
            @endforeach
        </select>
        <br>     
        <label for="expositor"> Expositor </label> 
        @foreach ($t8 as $expositor)       
            <input type="text" name="expositor" value="{{$expositor->nombre}}" id="expositor">
            @if ($errors->has('expositor'))
                <span class="error text-danger">{{$errors->first('expositor')}}</span>
            @endif
        @endforeach
        <br>
        <input type="submit" name="guardar" id="guardar">
        <br>

    </form>
    @endforeach
    </table>   
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
        <button type="submit" class="big" formaction="{{url('configuracion/actividades')}}">Actividades</button>
    </form>
@endsection