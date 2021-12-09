@extends('layouts.plantilla')

@section('title', 'inscripcion')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('eventos/seleccion/' . $id_usuario)}}">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Certificados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="#">Preinscripciones</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
<h1>{{$te[0]->nombre}}</h1>
<form action="{{url('')}}" method ="post" enctype="multipart/form-data">
    @csrf

        <label for="ti"> tipos inscrito </label>
        <select name="ti">
            @foreach ($ti as $t)
                <option value="{{$t->id}}">{{$t->nombre}}</option>
            @endforeach
        </select>
        <br>
        <label for="tpa"> paquetes </label>
        <select name="tpa">
            @foreach ($tpa as $t)
                <option value="{{$t->id}}">{{$t->nombre}}</option>
            @endforeach
        </select>
        <br>
        <label for="tpr"> promociones </label>
        <select name="tpr">
            @foreach ($tpr as $t)
                <option value="{{$t->id}}">{{$t->nombre}}</option>
            @endforeach
        </select>
        <br>
        <input type="submit" name="guardar" id="guardar">
        <br>

    </form>
@endsection