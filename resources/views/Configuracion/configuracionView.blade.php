<!-- UI04 -->
@extends('layouts.plantilla')

@section('title', 'Configuración')

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
        .button {
            background-color: #8FBCBB;
            border: none;
            color: white;
            padding: 10px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
            width: 218px;
        }
    </style>

    <h1>Configuración</h1>
    <div>
        <form>
            <button type="submit" class="button" formaction="{{url('configuracion/eventos')}}">Eventos</button>
        </form>

        <form>
            <button type="submit" class="button"formaction="{{url('configuracion/actividades')}}">Actividades</button>
        </form>

        <form>
            <button type="submit" class="button"formaction="{{url('configuracion/ambientes')}}">Ambientes</button>
        </form>

        <form>
            <button type="submit" class="button"formaction="{{url('configuracion/materiales')}}">Materiales</button>
        </form>
    </div>
@endsection