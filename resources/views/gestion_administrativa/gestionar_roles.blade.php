<!-- UI17 -->
@extends('layouts.plantilla')

@section('title', 'gestionar roles')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('/GestionAdministrativa/Eventos')}}">Eventos</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
    <h1>Gestionar Roles</h1>
<table class="table table-light" border = 1 width= "100%" style="border-color:#c7dede; border: 1px solid #c7dede;">
    <thead class = "thead-light">
        <tr>
            <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;"><b>Nombre</b></th>
            <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;"><b>Apellido</b></th>
            <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;"><b>Email</b></th>
            <th style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;"><b>Rol</bS></th>
        </tr>
    </thead>

    <tbody>
        
            @foreach ($t1 as $usuario)    
            <tr>
                <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;"><b>{{$usuario->unombre}}</b></td>
                <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$usuario->apellido}}</td>
                <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">{{$usuario->email}}</td>
                
                <td style ="width: 25%;text-align: left; vertical-align: top;border: 1px solid #c7dede;">
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
                    <input  class="btn btn-primary btn-xl disabled" type="submit" name="guardar" id="guardar">
                </form>
                </td>
                
            </tr>
            
            @endforeach
            
            <br>
        
    </tbody>
</table>

@endsection