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
    <td>
        <li>
            <a href="{{url('/GestionAdministrativa/ShowCrearComite/'.$dataEvento->id)}}">
                CrearComite
            </a> 
        </li>
        <li>EditarComite</li>
        <li>
            <a href="{{url('/GestionAdministrativa/GestionarRoles')}}">
            GestionarRoles
        </li>

    </td>
    
    

</tbody>
</html>