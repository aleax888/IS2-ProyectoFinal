<h1>Eventos</h1>
<table class="table table-light" border = 1>
    <thead class = "thead-light">
        <tr>
            <th>Nombre</th>
            <th>lugar</th>
            <th>Fecha inicio</th>
            <th>Fecha fin</th>
            <th> Administrar</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($eventos as $evento)    
        <tr>
            <td>{{$evento->nombre}}</td>
            <td>{{$evento->lugar}}</td>
            <td>{{$evento->fecha_inicio}}</td>
            <td>{{$evento->fecha_fin}}</td>
            <td>
                <a href="{{url('/GestionAdministrativa/Eventos/'.$evento->id)}}">
                    Administrar
                </a> 
            </td>
        </tr>
        @endforeach
    </tbody>
</table>