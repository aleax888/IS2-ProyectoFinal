<!-- UI05 -->
@extends('layouts.plantilla')

@section('title', 'Crear Material')

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
            width: 130px;
        }
    </style>

    <h1>Crear Material</h1>

    <form action="{{url('configuracion/crearmaterial')}}" method ="post" enctype="multipart/form-data">
    @csrf
        <label for="nombre"> Nombre Material </label>
        <input type="text" name="nombre" id="nombre">
        @if ($errors->has('nombre'))
            <span class="error text-danger">{{$errors->first('nombre')}}</span>
        @endif
        <br>
        <label for="descripcion"> Descripción </label>
        <input type="text" name="descripcion" id="descripcion">
        @if ($errors->has('descripcion'))
            <span class="error text-danger">{{$errors->first('descripcion')}}</span>
        @endif
        <br>
        <label for="cantidad"> Cantidad </label>
        <input type="int" name="cantidad" id="cantidad">
        @if ($errors->has('cantidad'))
            <span class="error text-danger">{{$errors->first('cantidad')}}</span>
        @endif
        <br>
        <label for="id_actividad"> Actividad </label>
        <select name="id_actividad">
            @foreach ($t1 as $actividad)
                <option value="{{$actividad->id}}"
                @if ($actividad->id == old('id_actividad', $actividad->id))
                    selected="selected"
                @endif
                >{{$actividad->nombre}}</option>
            @endforeach
        </select>
        <br>
        <label for="id_tipo_material"> Tipo del material </label>
        <select name="id_tipo_material">
            @foreach ($t as $tipo)
                <option value="{{$tipo->id}}"
                @if ($tipo->id == old('id_tipo_material', $tipo->id))
                    selected="selected"
                @endif
                >{{$tipo->nombre}}</option>
            @endforeach
        </select>
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
        <button type="submit" class="big" formaction="{{url('configuracion/materiales')}}">Materiales</button>
    </form>
@endsection