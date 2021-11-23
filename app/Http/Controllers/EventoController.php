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

    //codigo (PT05)
    public function index()
    {
        //
        $datosEvento = DB::table('eventos')
                        ->select('eventos.id','eventos.nombre','eventos.lugar','eventos.fecha_inicio','fecha_fin')
                        ->get();
        return view('gestion_administrativa.index',compact(['datosEvento']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //codigo (PT15)
    public function crearEvento()
    {
        $t = DB::table('tipos_evento')
            ->select('tipos_evento.nombre', 'tipos_evento.id')
            ->get();
        return view('crearEventoView', compact('t'));
    }

    //codigo (PT16)
    public function crearEventoGuardar()
    {
        $t = DB::table('tipos_evento')
            ->select('tipos_evento.nombre', 'tipos_evento.id')
            ->get();
        $datosEvento = request()->except('_token', 'guardar');

        Evento::insert($datosEvento); 
        
        return view('crearEventoView', compact('t'));
    }

    //codigo (PT17)
    public function adaptarEvento()
    {
        return view('adaptarEventoView');
    }

    //codigo (PT18)
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

    //codigo (PT19)
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

    //codigo (PT20)
    public function showEditarRol($id_evento)
    {
        $t1 = DB::table('usuarios')
            ->join('inscripciones', 'inscripciones.id_usuario','=','usuarios.id')
            ->join('eventos', 'eventos.id','=','inscripciones.id_evento')
            ->join('roles','roles.id','=','usuarios.id_rol')
            ->where('eventos.id','=',$id_evento)
            ->select('usuarios.id','usuarios.nombre as unombre', 'usuarios.apellido', 'usuarios.email','roles.nombre as rnombre', 'roles.id as rid')
            ->get();
        $t2 = DB::table('roles')
            ->select('roles.id','roles.nombre')
            ->get();
        
        return view('gestion_administrativa.gestionar_roles', compact('t1', 't2', 'id_evento'));
    }

    //codigo (PT21)
    public function saveEditarRol($id_evento)
    {
        //$datosUsuario = request()->except('_token', 'guardar');
        $id = request()->input('id');
        $id_rol = request()->input('id_rol');
        DB::table('usuarios')
            ->where('id',$id)
            ->update(array('id_rol'=>$id_rol));
        
        return EventoController::showEditarRol($id_evento);
    }

    //codigo (PT22)
    public function ShowGuardarComite($id){
        //$datosComite = request()->all();
        //Comite::insert($datosComite);
        $dataEvento = Evento::findOrFail($id);
        
        return view('gestion_administrativa.crear_comite', compact('dataEvento'));
        //return response()->json($id);
    }

    //codigo (PT23)
    public function GuardarComite(){
        $datosComite = request()->except(['_token','guardar']);

        Comite::insert($datosComite); 
        
        return response()->json($datosComite);
    }
}
