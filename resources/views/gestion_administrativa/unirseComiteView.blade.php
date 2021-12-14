@extends('layouts.plantilla')

@section('title', 'Eventos')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #DEC692" href="{{url('eventos/seleccion/' . $id_usuario)}}">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Certificados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="{{url('preinscripciones/seleccion/' . $id_usuario)}}">Preinscripciones</a>
            </li>
        </ul>
    </div> 

@endsection

@section('content')
<h3>Lista de Eventos</h3>
    <div style="width:60%">
        <table class="table table-striped table-light" border="1">
            <thread class = "thead-light">
                <tr >
                    <th>Evento</th>
                    <th>Comite</th>
                </tr>
            </thread>
            @foreach ($t as $t)
                <tr>
                    <td>
                        {{$t->nombre}}
                        
                    </td>
                    <td>{{$t->cnombre}}</td>
                    <td>
                    <form action="{{url('unirse/comite/'.$id_usuario)}}" method ="post" enctype="multipart/form-data">
                        @csrf
                            @if ($t->pre > 0)
                                <label for="idu"> dentro del comite </label>
                            @else
                                <label for="idu"> unirse </label>
                                <input type="hidden" value="{{$t->id}}" name="ide" id="ide">
                                <input type="submit" name="guardar" id="guardar">
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection