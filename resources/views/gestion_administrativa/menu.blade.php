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
    {{-- <h1>Evento: {{$datosEvento[0]->nombre}}</h1>
    <br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearComiteModal">
        CrearComite
    </button>

    <div class="modal fade" id="crearComiteModal" tabindex="-1" role="dialog" aria-labelledby="CrearComite" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear Comite</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="{{ url('GestionAdministrativa/CrearComite')}}" method ="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                    
                        <label for="nombreComite"> Nombre </label>
                        <input type="text" name="nombre" id="nombreComite">
                        <br>
                        <label for="NroIntegrantes"> Nro Integrantes </label>
                        <input type="number" name="nro_inte" id = "NroIntegrantes">
                        <!-- <br>
                        <input type="submit" name="guardar" id="guardar"> -->
                        <br>
                        <input type="hidden" value="{{$datosEvento[0]->id}}" name="id_evento">
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>--}}

    <button onclick="myFunction1()" class="btn btn-primary">GestionarComites</button>
    <button onclick="myFunction2()" class="btn btn-primary">GestionarRoles</button>
    <div id="CrudComites" style="display: block">
        <table class="table table-dark table-striped mt-4">
            <thead>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#crearComiteModal">Crear Comite</button>
                <tr>
                    <th scope="col"> Nombre </th>
                    <th scope="col"> Nro Integrantes </th>
                    {{-- <th type="button" class="btn btn-info" data-toggle="modal" data-target="#crearComiteModal"> Crear Comite</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($datosComite as $comite)
                    <div class="modal fade" id="editarComite{{$comite->id}}" tabindex="-1" role="dialog" aria-labelledby="editarComite" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Editar Comite: {{$comite->nombre}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <form action="{{ url('/GestionAdministrativa/EditarComite/')}}" method ="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$evento_id}}" name = "id_evento">
                                    <input type="hidden" value="{{$comite->id}}" name = "id_comite">
                                    <div class="modal-body">
                                        <label for="Comite"> Nombre :</label>
                                        <input type="text" name="nombre" id="nombreComite" value="{{$comite->nombre}}">
                                        <br>
                                        <label for="Comite"> Nro Integrantes :</label>
                                        <input type="number" name="Nro_inte" id="nro_inte" value="{{$comite->nro_inte}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <tr>
                        <td>{{$comite->nombre}}</td>
                        <td>{{$comite->nro_inte}}</td>
                        <td type="button" class="btn btn-info" data-toggle="modal" data-target="#editarComite{{$comite->id}}">Editar</td>
                        <td ><a class="btn btn-info" href="{{url('/GestionAdministrativa/EliminarComite/'.$comite->id.'/'. $evento_id)}}">Eliminar</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="CrudRoles" style="display: none">
        <table class="table table-dark table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col"> Nombre </th>
                    <th scope="col"> Apellido </th>
                    <th scope="col"> Email </th>
                    <th scope="col"> Rol </th>
                    {{-- <th type="button" class="btn btn-info" data-toggle="modal" data-target="#crearComiteModal"> Crear Comite</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($datosUsuario as $usuario)
                <div class="modal fade" id="editarRolModal{{$usuario->unombre}}" tabindex="-1" role="dialog" aria-labelledby="editarRol" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Editar nombre de {{$usuario->unombre}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <form action="{{ url('/GestionAdministrativa/EditarRol/'.$evento_id)}}" method ="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$usuario->uid}}" name = "id_usuario">
                                <input type="hidden" value="{{$usuario->rid}}" name = "actualRolID">
                                <div class="modal-body">
                                    <label for="roles">Rol actual:</label>
                                    <select name="Rol" id="id_rol">
                                        @foreach ($roles as $rol)
                                        
                                            @if ($rol->id == $usuario->rid)
                                                <option value="{{$rol->id}}" selected="selected">{{$usuario->rnombre}}</option>
                                            @else
                                                <option value="{{$rol->id}}"
                                                    {{-- @if ($rol->id == old('id_rol', $rol->id))
                                                        selected="selected"
                                                    @endif --}}
                                                >{{$rol->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    {{-- <input type="hidden" value="{{$evento_id}}" name="id_evento"> --}}
                                </div>
                                <div class="modal-footer">
                                    <button type="" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                    <tr>
                        <td>{{$usuario->unombre}}</td>
                        <td>{{$usuario->apellido}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->rnombre}}</td>
                        <td type="button" class="btn btn-info"  data-toggle="modal" data-target="#editarRolModal{{$usuario->unombre}}">Editar Rol</td>
                        {{-- <td ><a class="btn btn-info" href="{{url('/GestionAdministrativa/EliminarComite/'.$comite->id.'/'. $evento_id)}}">Eliminar</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="crearComiteModal" tabindex="-1" role="dialog" aria-labelledby="CrearComite" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear Comite</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="{{ url('GestionAdministrativa/CrearComite')}}" method ="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                    
                        <label for="nombreComite"> Nombre </label>
                        <input type="text" name="nombre" id="nombreComite">
                        <br>
                        <label for="NroIntegrantes"> Nro Integrantes </label>
                        <input type="number" name="nro_inte" id = "NroIntegrantes">
                        <!-- <br>
                        <input type="submit" name="guardar" id="guardar"> -->
                        <br>
                        <input type="hidden" value="{{$evento_id}}" name="id_evento">
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection