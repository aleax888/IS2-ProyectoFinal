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
        @foreach ($datosUsuario as $usuario)    
        <tr>
            <td>{{$usuario->nombre}}</td>
            <td>{{$usuario->apellido}}</td>
            <td>{{$usuario->email}}</td>
            <td>
                {{$usuario->rol}}
                <select>
                    @foreach ($lista_roles as $rol)
                    <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>