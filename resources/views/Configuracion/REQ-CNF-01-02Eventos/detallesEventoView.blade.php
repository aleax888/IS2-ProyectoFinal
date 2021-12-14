<!-- UI04 -->
@extends('layouts.plantilla')

@section('title', 'Ver detalles evento')

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

    <h1>Detalles</h1>
    
    <div style="width:50%">
    <table class="table table-striped table-light" border="1">        
        <tr>
            <td>
                <strong>ACTIVIDAD</strong>
            </td>
            <td>
                <strong>AMBIENTE</strong>
            </td>
            <td>
                <strong>MATERIAL(ES)</strong>
            </td>
        </tr>      
        @foreach ($t as $actividad)      
            <tr>
                <td>
                    {{$actividad->nombre}}
                </td>
                <td>
                    @foreach ($t1 as $ambiente) 
                        @if($ambiente->id == $actividad->id_ambiente)
                            {{$ambiente->nombre}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($t2 as $material) 
                        @if($material->id_actividad == $actividad->id)
                            {{$material->nombre}},
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>   
    </div>

    <form>
        <button type="submit" class="big" formaction="{{url('configuracion/eventos')}}">Eventos</button>
    </form>

@endsection