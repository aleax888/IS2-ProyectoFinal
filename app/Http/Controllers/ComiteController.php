<?php

namespace App\Http\Controllers;


use App\Models\Comite;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

// codigo de controlador (CD02)
class ComiteController extends Controller
{
    public function unirseComite($id_usuario)
    {
        $t = DB::table('inscripciones')
        ->select('eventos.nombre', 'comites.nombre as cnombre','comites.id', DB::raw("(CASE 
        WHEN (SELECT id_usuario from codigos 
            WHERE id_usuario ='$id_usuario'and id_comite = comites.id) 
            THEN 1 
        ELSE 0 
        END) as pre"))
        ->join('eventos', 'eventos.id','=','inscripciones.id_evento')
        ->join('comites', 'comites.id_evento','=','inscripciones.id_evento')
        ->where('inscripciones.id_usuario','=',$id_usuario)
        ->get();
    
        return view('gestion_administrativa.unirseComiteView', compact('t','id_usuario')); 
    }

    public function unirseComiteGuardar($id_usuario)
    {
        $datos = request()->except('_token', 'guardar');
        DB::table('codigos')->insert([
            'codigo_comite' => rand(),
            'id_comite' => $datos['ide'],
            'id_usuario' => $id_usuario,
            
        ]);
        return ComiteController::unirseComite($id_usuario);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $datosComite = request()->all();
        //return response()->json($datosComite);
        // return view('gestion_administrativa.crear_comite');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // $datosComite = request()->all();
        // //Comite::insert($datosComite);

        // return response()->json($datosComite);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comite  $comite
     * @return \Illuminate\Http\Response
     */
    public function show(Comite $comite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comite  $comite
     * @return \Illuminate\Http\Response
     */
    public function edit(Comite $comite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comite  $comite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comite $comite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comite  $comite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comite $comite)
    {
        //
    }
}
