Formulario para crear comite

<form action="{{ url('GestionAdministrativa/CrearComite')}}" method ="post" enctype="multipart/form-data">
@csrf

    <label for="nombreComite"> Nombre </label>
    <input type="text" name="nombre" id="nombreComite">
    <br>
    <label for="NroIntegrantes"> Nro Integrantes </label>
    <input type="number" name="nro_inte" id = "NroIntegrantes">
    <br>
    <input type="submit" name="guardar" id="guardar">
    <br>
    <input type="hidden" value="{{$dataEvento->id}}" name="id_evento">
    <br>
</form>