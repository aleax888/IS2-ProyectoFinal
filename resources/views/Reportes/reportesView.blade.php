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
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/GestionAdministrativa/Eventos')}}">Administracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/configuracion/seleccion')}}">Configuracion</a>
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
<div class="container" style= "float:left " width="70%">
                <div class="text-center" style="margin-top:100px">
                    <h2 class="section-heading text-uppercase">EVENTOS</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="img-thumbnail" width="350px" heigth="350px" src="../images/img1.jpeg" alt="..." />
                            <h3>World Travel Market London (WTM) 2021</h3>
                           
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="img-thumbnail" width="350px" heigth="350px" src="../images/img2.jpeg" alt="..." />
                            <h3>MVNOs World Congress 2021</h3>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="img-thumbnail" width="350px" heigth="350px" src="../images/img3.jpeg" alt="..." />
                            <h3>Conference Partners Evolution 2021</h3>
                            
                        </div>
                    </div>
                </div>
            </div>
    <div>
</div>        
<div style = "float:right; background-color:#c7dede; margin:6px" width="50%" >      
    <a href="{{url('/reportes/inscritos')}}">
        <h3>Reporte de Inscritos</h3>
    </a> 
    
    <a href="{{url('/reportes/materiales')}}">
        <h3>Reporte de Materiales</h3>
    </a>

    
    <h3>Cierre de Caja por Evento</h3>
        <div style="width:750px">
        <table class="table table-striped table-light" border="1">
            <thread class = "thead-light">
            <tr >
                <th>Eventos</th>
            </tr>
            </thread>
            @foreach ($t as $t)
                <tr>
                    <td>
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