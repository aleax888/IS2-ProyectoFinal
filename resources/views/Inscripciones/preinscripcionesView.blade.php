@extends('layouts.plantilla')

@section('title', 'misPreinscripciones')

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
                <a class="nav-link" style="color: #DEC692" href="{{url('preinscripciones/seleccion/' . $id_usuario)}}">Preinscripciones</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')

    @foreach ($t as $t)
    
        <tr>
            <td>
                {{$t->nombre}}
            </td>
            <td>
                @if($t->v > 0)
                    <p>dentro del comite</p>
                @else
                    <a class="nav-link"  href="{{url('inscripcion/form/' . $id_usuario .'/'. $t->id)}}">Inscribirse</a>
                @endif
            </td>
        </tr>
    @endforeach
@endsection