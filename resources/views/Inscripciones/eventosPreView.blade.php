@extends('layouts.plantilla')

@section('title', 'Eventos')

@section('lista')
    <div class="container-fluid">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #8FBCBB" href="#">Certificados</a>
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
                    <th>Eventos</th>
                </tr>
            </thread>
            @foreach ($t as $t)
                <tr>
                    <td>
                        {{$t->nombre}}
                    </td>
                    <td>
                        <a href="{{url('preinscripcion/form/' . $t->id)}}">
                            Preinscribirse
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection