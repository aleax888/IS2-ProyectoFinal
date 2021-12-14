<!-- UI04 -->
@extends('layouts.plantilla')

@section('title', 'Ambientes')

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
            padding: 10px 24px;
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
            width: 80px;
        }
    </style>

    <h1>Ambientes</h1>
    
    <form>
        <button type="submit" class="big" formaction="{{url('configuracion/crearambiente')}}">Nuevo Ambiente</button>
        <button type="submit" class="big" formaction="{{url('configuracion/seleccion')}}">Configuración</button>
    </form>
    
    <div style="width:50%">
    <table class="table table-striped table-light" border="1">                
        @foreach ($t as $t)
            <tr>
                <td>
                    {{$t->nombre}}
                </td>
                <td>
                    <form>
                        <button type="submit" class="small" formaction="{{url('configuracion/datosambiente',[$t->id])}}">Ver</button>
                    </form>
                </td>
                <td>
                    <form>
                        <button type="submit" class="small" formaction="{{url('configuracion/adaptarambiente',[$t->id])}}">Adaptar</button>
                    </form>
                </td>
                <td>
                    <form>
                        <button type="submit" class="small" formaction="{{url('configuracion/editarambiente',[$t->id])}}">Editar</button>
                    </form>                    
                </td>      
            </tr>
        @endforeach
    </table>   
    </div>

@endsection