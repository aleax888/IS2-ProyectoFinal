<!-- UI11 -->
@extends('layouts.plantilla')

@section('title', 'Reportes')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="{{url('/reportes/seleccion')}}">Reportes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #5e81ac" href="{{url('/GestionAdministrativa/Eventos')}}">Administracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #5e81ac" href="{{url('/configuracion/seleccion')}}">Configuracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #5e81ac" href="#">Caja</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #5e81ac" href="#">Asistencia</a>
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
<div style = "float:right; background-color:#c7dede; margin-top:6px" width="50%" >      
    <a href="{{url('/reportes/inscritos')}}">
        <h3>Reporte de Inscritos</h3>
    </a> 
    
    <a href="{{url('/reportes/materiales')}}">
        <h3>Reporte de Materiales</h3>
    </a>

    
    <h3>Cierre de Caja por Evento</h3>
        <div style="width:750px">
        <table class="table table-striped table-light" border="1" width= "100%" style="border-color:#c7dede; border: 1px solid #c7dede;" >
            <thread class = "thead-light">
            <tr style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;" >
                <th>Eventos</th>
            </tr>
            </thread>
            @foreach ($t as $t)
                <tr style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">
                    <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">
                        <a href="{{url('reportes/cierredecaja/evento/' . $t->id)}}">
                            {{$t->nombre}}
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        </div>
    
         <a href="{{url('reportes/cierredecaja/diario/' . date('Y-m-d'))}}">
          <h3>Cierre de Caja diario</h3>
         </a>
    </div>   
    </div>   
</div>   
</div> 
<footer style="display: table;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: 45%">
    <p>© DevCode-2021 Todos los derechos reservados UCSP</p>
</footer>
 
@endsection