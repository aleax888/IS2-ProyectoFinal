<!-- UI08 -->
@extends('layouts.plantilla')

@section('title', 'MaterialesAmbiente')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Certificados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="{{url('asistencia/seleccion/')}}">Responsabilidades</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
<h3>Materiales Disponibles</h3>

<div style="width:40%">
<table class="table table-striped table-light" border="1">

    <tr>
        <th>Nombre Material</th>
        <th>Cantidad</th>
        <th>Descripcion</th>
        <th>Tipo</th>
        <th>Cantidad a entregar</th>
    </tr>

    @foreach ($t as $t)
        <tr>
            <td>{{$t->nombre}}</td>
            <td>{{$t->cantidad}}</td>
            <td>{{$t->descripcion}}</td>
            <td>{{$t->t}}</td>
            <td>
                <form action="{{url('responsabilidades/materialesAmbiente')}}" method ="post" enctype="multipart/form-data">
                @csrf
                    <input type="number" name="cantidad" id = "cantidad">
                    <input type="hidden" name="id" id="id" value="{{$t->id}}">
                    <input type="submit" name="guardar" id="guardar">
                </form>
            </td>
            
            
        </tr>
    @endforeach

    </table>
</div>   
@endsection