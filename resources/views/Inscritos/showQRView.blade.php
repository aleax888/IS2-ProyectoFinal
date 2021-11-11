@extends('layouts.plantilla')

@section('title', 'Codigo QR de ' . $inscrito)

@section('content')
    <h1>Codigo QR de {{$inscrito}}</h1>
@endsection