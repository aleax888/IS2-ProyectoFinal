@extends('layouts.plantilla')

@section('title', 'Codigo QR de ' . $t[0]->unombre)

@section('content')
    <h1>Codigo QR de {{$t[0]->unombre}}</h1>
    {{$t[0]->QR}}
@endsection