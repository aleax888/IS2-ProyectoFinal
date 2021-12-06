<!-- UI17 -->
@extends('layouts.plantilla')

@section('title', 'gestionar roles')

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
    <h1>Gestionar Roles</h1>
<table class="table table-light" border = 1>
    <thead class = "thead-light">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Rol</th>
        </tr>
    </thead>

    <tbody>
        
            @foreach ($t1 as $usuario)    
            <tr>
                <td>{{$usuario->unombre}}</td>
                <td>{{$usuario->apellido}}</td>
                <td>{{$usuario->email}}</td>
                
                <td>
                <form action="{{url('GestionAdministrativa/GestionarRoles/'. $id_evento)}}" method ="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$usuario->id}}">
                    <select name="id_rol">
                        @foreach ($t2 as $rol)
                            @if ($rol->id == $usuario->rid)
                            <option value="{{$rol->id}}" selected="selected">{{$usuario->rnombre}}</option>
                            @else
                            <option value="{{$rol->id}}"
                            @if ($rol->id == old('id_rol', $rol->id))
                                selected="selected"
                            @endif
                            >{{$rol->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                    <input type="submit" name="guardar" id="guardar">
                </form>
                </td>
                <td>
                
                </td>
            </tr>
            
            @endforeach
            
            <br>
        
    </tbody>
</table>

@endsection