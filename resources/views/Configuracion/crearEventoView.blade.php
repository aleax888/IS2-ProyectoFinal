<!-- UI05 -->
@extends('layouts.plantilla')

@section('title', 'crear evento')

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
    <form action="{{url('configuracion/crearevento')}}" method ="post" enctype="multipart/form-data">
    @csrf
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0" style="margin-top:7%">Crear Evento</h2>
                <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
    <div class="row justify-content-center" width="10%">
      <div class="col-lg-3 col-xl-3.5">
        <div>
          <div class="form-floating mb-3">
                 <label for="nombreComite"> Nombre Evento </label>
                 <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Ingresa el nombre del Evento..." />  
            </div>
        </div>
        <div>
          <div class="form-floating mb-3">
                 <label for="NroIntegrantes"> Lugar del Evento </label>
                 <input class="form-control"  type="text" name="lugar" id = "lugar" placeholder="Ingresa el lugar del Evento..."/>  
            </div>
        </div>
        <div>
        <div class="form-floating mb-3">
                 <label for="NroIntegrantes"> Fecha del Evento </label>
                 <input class="form-control"  type="date" name="fecha_inicio" id = "fecha_inicio" placeholder="Ingresa el lugar del Evento..."/>  
            </div>
        </div>
        <div>
        <div class="form-floating mb-3">
                 <label for="NroIntegrantes"> Fecha de Fin del Evento </label>
                 <input class="form-control"  type="date" name="fecha_fin" id = "fecha_fin" placeholder="Ingresa el lugar del Evento..."/>  
            </div>
        </div>
        <div>
        <div class="form-floating mb-3">
                 <label for="id_tipo_evento"> Tipo del evento </label>
                 <select name="id_tipo_evento">
                   @foreach ($t as $t)
                      <option value="{{$t->id}}"
                     @if ($t->id == old('id_tipo_evento', $t->id))
                       selected="selected"
                    @endif
                      >{{$t->nombre}}</option>
                    @endforeach
                 </select>
           </div>
        </div>
        <div>
             <input class="btn btn-primary btn-xl disabled" type="submit" name="guardar" id="guardar">
        </div>      
      </div>
    </div>
    </form>

@endsection