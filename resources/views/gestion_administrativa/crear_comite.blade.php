<!-- UI16 -->
@extends('layouts.plantilla')

@section('title', 'Administracion')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/reportes/seleccion')}}">Reportes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="{{url('/GestionAdministrativa/Eventos')}}">Administracion</a>
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
<form action="{{ url('GestionAdministrativa/CrearComite')}}" method ="post" enctype="multipart/form-data">
@csrf

<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0" style="margin-top:7%">Crear Comite</h2>
                <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
<div class="row justify-content-center" width="10%">
   <div class="col-lg-8 col-xl-7">
        <div>
          <div class="form-floating mb-3">
                 <label for="nombreComite"> Nombre </label>
                 <input class="form-control" name="nombre" id="nombreComite" type="text" placeholder="Ingresa el nombre del comite..." />  
            </div>
        </div>
        <div>
          <div class="form-floating mb-3">
                 <label for="NroIntegrantes"> Nro Integrantes </label>
                 <input class="form-control"  type="number" name="nro_inte" id = "NroIntegrantes"/>  
            </div>
        </div>
        <div>
             <input class="btn btn-primary btn-xl disabled" type="submit" name="guardar" id="guardar">
        </div>
        <div>
            <input type="hidden" value="{{$dataEvento->id}}" name="id_evento">
        </div>
    </div>  
</div>   
</form>
@endsection