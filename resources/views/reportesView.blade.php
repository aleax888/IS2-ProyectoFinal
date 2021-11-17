@extends('layouts.plantilla')

@section('title', 'Reportes')

@section('content')
    
    <a href="{{url('/reportes/inscritos')}}">
        <h3>Reporte de Inscritos</h3>
    </a> 
    
    <a href="{{url('/reportes/materiales')}}">
        <h3>Reporte de Materiales</h3>
    </a>
    <h3>Cierre de Caja por Evento</h3>
        <table border="1">
            <tr>
                <th>Eventos</th>
            </tr>
                
            @foreach ($t1 as $t)
                <tr>
                    <td>
                        <a href="{{url('reportes/cierredecaja/evento/' . $t->id)}}">
                            {{$t->nombre}}
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    <h3>Cierre de Caja diario</h3>
        <table border="1">
            <tr>
                <th>Fechas</th>
            </tr>
                
            @foreach ($t2 as $t)
                <tr>
                    <td>
                        <a href="{{url('reportes/cierredecaja/diario/' . $t->fecha)}}">
                            {{$t->fecha}}
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
@endsection