<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<tbody>
    <h1>{{$dataEvento->nombre}}</h1>
    <br>
    <tr>
        <td>
            <a href="{{url('/GestionAdministrativa/ShowCrearComite/'.$dataEvento->id)}}">
                CrearComite
            </a> 
        </td>
        <td>EditarComite</td>
        <td>
            <a href="{{url('/GestionAdministrativa/GestionarRoles')}}">
            GestionarRoles
        </td>

    </tr>
    
    

</tbody>
</html>