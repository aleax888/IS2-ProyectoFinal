<!-- UI06 -->
@extends('layouts.plantilla')

@section('title', 'Editar ambiente')

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

    <h1>Editar Ambiente</h1>

    <div style="width:50%">
    <table class="table table-striped table-light" border="1">  
    @foreach ($t as $ambiente) 
    <h2 style="color: #8FBCBB">{{$ambiente->nombre}}</h2>
    <form action="{{url('configuracion/editarambiente/'. $id)}}" method ="post" enctype="multipart/form-data">
    @csrf
        <label for="nombre"> Nombre Ambiente </label>
        <input type="text" name="nombre" value="{{$ambiente->nombre}}"  id="nombre">
        @if ($errors->has('nombre'))
            <span class="error text-danger">{{$errors->first('nombre')}}</span>
        @endif
        <br>
        <label for="ubicacion"> Ubicación </label>
        <input type="text" name="ubicacion" value="{{$ambiente->ubicacion}}" id="ubicacion">
        @if ($errors->has('ubicacion'))
            <span class="error text-danger">{{$errors->first('ubicacion')}}</span>
        @endif
        <br>
        <label for="capacidad"> Capacidad </label>
        <input type="int" name="capacidad" value="{{$ambiente->capacidad}}" id="capacidad">
        @if ($errors->has('capacidad'))
            <span class="error text-danger">{{$errors->first('capacidad')}}</span>
        @endif
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
        <button type="submit" class="big" formaction="{{url('configuracion/ambientes')}}">Ambientes</button>
    </form>
@endsection