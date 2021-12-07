<!-- UI19 -->
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
    <section class="page-section portfolio" id="portfolio">
            <div class="container" style="margin-top:5%;" >
                <!-- Section Heading-->
                <h1 class="page-section-heading text-center text-uppercase text-secondary mb-0">Evento: {{$dataEvento->nombre}}</h1>
                <!-- Grid Items-->
                <div class="row justify-content-center" style="margin-top:5%; aling-items:center; justify-content:center" >
                    <!-- Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                            <a href="{{url('/GestionAdministrativa/GestionarRoles/' . $dataEvento->id)}}"><img class="img-fluid" width="350px" heigth="350px" src="../../images/img4.png" alt="..." /> <h3 style="text-align:center;">Gestionar roles</h3> </a>
                        </div>
                    </div>
                    <!-- Item 2-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                            <a href="{{url('/GestionAdministrativa/ShowCrearComite/'.$dataEvento->id)}}" > <img class="img-fluid" width="250px" heigth="250px" src="../../images/img8.png" alt="..." /> <h3 style="text-align:center;">Crear comite</h3></a>
                        </div>
                    </div>
                     <!-- Item 3-->
                     <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                            <a href="#" style="text-align:center;"> <img class="img-fluid" width="250px" heigth="150px" src="../../images/img7.png" alt="..." /> <h3 style="text-align:center;">Editar Comite</h3></a>
                        </div>
                    </div>
            </div>        
   </section>                
<footer style="display: table;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: 23%">
    <p>© DevCode-2021 Todos los derechos reservados UCSP</p>
</footer>   
@endsection
