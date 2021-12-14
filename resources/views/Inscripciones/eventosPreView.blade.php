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

<div style="display:inline; width:60%">
    <div class="container" style= " background-color:#eef2f9; " width="50%">
                    <div class="text-center" style="margin-top:100px">
                        <h2 class="section-heading text-uppercase">EVENTOS</h2>
                    </div>
                    <div class="row">
                
                @foreach ($t as $t)
                <div class="col-lg-4">
                            <div class="team-member">
                             <img class="img-thumbnail" width="330px" heigth="330px" src="{{asset('images/' . $t->id . '.jpeg')}}" alt="..." />
                             <h3><b>{{$t->nombre}}</b></h3>
                             <div>
                              <form action="{{url('eventos/seleccion')}}" method ="post" enctype="multipart/form-data">
		                @csrf
		                    @if ($t->pre > 0)
		                        <label for="idu"> Preinscrito </label>
		                    @else
		                        <label for="idu"> Preinscribirse </label>
		                        <input type="hidden" value="{{$id_usuario}}" name="idu" id="idu">
		                        <input type="hidden" value="{{$t->id}}" name="ide" id="ide">
		                        <input type="submit" name="guardar" id="guardar">
		                    @endif
		                </form>
                             </div>
        
                    </div>
                </div>
                @endforeach
                    </div>
    </div>
</div>  
@endsection