<!-- UI04 -->
@extends('layouts.plantilla')

@section('title', 'Configuracion')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/reportes/seleccion')}}">Reportes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/GestionAdministrativa/Eventos')}}">Administracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="{{url('/configuracion/seleccion')}}">Configuracion</a>
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
<div style="display:inline">
    <div class="container" style= "float:left; background-color:#eef2f9; " width="50%">
                    <div class="text-center" style="margin-top:100px">
                        <h2 class="section-heading text-uppercase">EVENTOS</h2>
                    </div>
                    <div class="row">
                
                @foreach ($t as $evento)
                <div class="col-lg-4">
                            <div class="team-member">
                             <img class="img-thumbnail" width="330px" heigth="330px" src='../images/{{$evento->id}}.jpeg' alt="..." />
                             <h3><b>{{$evento->nombre}}</b></h3>
        
                    </div>
                </div>
                @endforeach
                    </div>
    </div>
</div>   
<div style = "float:right; background-color:#c7dede; margin-top:40px" width="10%" > 
    <h1><b>Configuracion</b></h1>

    <a href="{{url('configuracion/crearevento')}}">
        <h3>Crear Evento</h3>
    </a> 
    
    <h3>Adaptar Evento</h3>
    <div style="width:750px">
    <table class="table table-striped table-light" border="1" width= "100%%" style="border-color:#c7dede; border: 1px solid #c7dede;">
        <tr>
            <th style ="width: 33%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">Eventos</th>
            <th  style ="width: 33%;text-align: left; vertical-align: top;border: 1px solid #c7dede;"></th>
            <th  style ="width: 33%;text-align: left; vertical-align: top;border: 1px solid #c7dede;"></th>
        </tr>
                
        @foreach ($t as $t)
            <tr>
                <td style ="width: 33%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">
                   <b>{{$t->nombre}}</b>
                </td>
                <td style ="width: 33%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">
                    <a href="{{url('configuracion/adaptarevento')}}">
                        <b>Adaptar</b>
                    </a>
                </td>
                <td style ="width: 33%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">
                    <a href="{{url('configuracion/editarevento')}}">
                        <b>Editar</b>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>   
    </div>
    
    <a href="#">
        <h3>Nueva Actividad</h3>
    </a> 

    <a href="#">
        <h3>Nuevo Ambiente</h3>
    </a> 

    <a href="#">
        <h3>Nuevo Material</h3>
    </a> 
</div>

<footer style="display: table;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: 45%">
    <p>© DevCode-2021 Todos los derechos reservados UCSP</p>
</footer>
@endsection