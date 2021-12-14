<!-- UI04 -->
@extends('layouts.plantilla')

@section('title', 'Ver datos material')

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

    <h1>Datos de Material</h1>
    
    <div style="width:50%">
    <table class="table table-striped table-light" border="1">         
        @foreach ($t as $material) 
        <h2 style="color: #8FBCBB">{{$material->nombre}}</h2>      
            <tr>
                <td>
                    Nombre:
                </td>
                <td>
                    {{$material->nombre}}
                </td>
            </tr>
            <tr>
                <td>
                    Descripción:  
                </td>
                <td>
                    {{$material->descripcion}}
                </td>
            </tr>
            <tr>
                <td>
                    Cantidad: 
                </td>
                <td>
                    {{$material->cantidad}}
                </td>
            </tr>
            <tr>
                <td>
                    Tipo del material: 
                </td>
                <td>
                    @foreach ($t2 as $tipo) 
                        {{$tipo->nombre}}
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    Actividad: 
                </td>
                <td>
                    @foreach ($t1 as $actividad) 
                        {{$actividad->nombre}}
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>   
    </div>

    <form>
        <button type="submit" class="big" formaction="{{url('configuracion/materiales')}}">Materiales</button>
    </form>
@endsection