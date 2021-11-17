<?php

namespace App\Http\Controllers;

use App\Models\Comite;
use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datosEvento['eventos'] = Evento::paginate(5);
        return view('gestion_administrativa.index',$datosEvento);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearEvento()
    {
        $t = DB::table('tipos_evento')
            ->select('tipos_evento.nombre', 'tipos_evento.id')
            ->get();
        return view('crearEventoView', compact('t'));
    }

    public function adaptarEvento()
    {
        return view('adaptarEventoView');
    }

    public function editarEvento()
    {
        return view('editarEventoView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento, $id)
    {
        //
        $dataEvento = Evento::findOrFail($id);
        return view('gestion_administrativa.menu', compact('dataEvento'));
    }

    /**
     * Show the form for editing the specified resourc  e.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        //
    }

    public function ShowGuardarComite($id){
        //$datosComite = request()->all();
        //Comite::insert($datosComite);
        $dataEvento = Evento::findOrFail($id);
        
        return view('gestion_administrativa.crear_comite', compact('dataEvento'));
        //return response()->json($id);
    }

    public function GuardarComite(){
        $datosComite = request()->except(['_token','guardar']);

        Comite::insert($datosComite); 
        
        return response()->json($datosComite);
    }
}
