<!-- UI04 -->
@extends('layouts.plantilla')

@section('title', 'Ver datos ambiente')

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
    </style>

    <h1>Datos de Ambiente</h1>
    
    <div style="width:50%">
    <table class="table table-striped table-light" border="1">         
        @foreach ($t as $ambiente) 
        <h2 style="color: #8FBCBB">{{$ambiente->nombre}}</h2>      
            <tr>
                <td>
                    Nombre:
                </td>
                <td>
                    {{$ambiente->nombre}}
                </td>
            </tr>
            <tr>
                <td>
                    Ubicación:  
                </td>
                <td>
                    {{$ambiente->ubicacion}}
                </td>
            </tr>
            <tr>
                <td>
                    Capacidad: 
                </td>
                <td>
                    {{$ambiente->capacidad}}
                </td>
            </tr>
        @endforeach
    </table>   
    </div>

    <form>
        <button type="submit" class="big" formaction="{{url('configuracion/ambientes')}}">Ambientes</button>
    </form>
@endsection