<?php

namespace App\Http\Controllers;

use App\Models\Comite;
use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Actividad;
use App\Models\Dtlle_actividad;
use App\Models\Material;

// codigo de controlador (CD04)
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
        return view('Configuracion.crearEventoView', compact('t'));
    }

    //código (PT24): Ver toda la lista de eventos existentes.
    public function verEventos()
    {
        $t = DB::table('eventos')
        ->select('nombre', 'id')
        ->get();
        return view('Configuracion.REQ-CNF-01-02Eventos.eventosView', compact('t'));
    }
    //código (PT25): Ver datos de un evento en particular (nombre, lugar, fecha inicio y fin, tipo).
    public function verDatosEvento($id)
    {
        $t = DB::table('eventos')
            ->where('id','=',$id)
            ->select('id','nombre','lugar','fecha_inicio','fecha_fin','id_tipo_evento')
            ->get();
        
        $t1 = DB::table('tipos_evento')
            ->where('id','=',$t->first()->id_tipo_evento)
            ->select('nombre', 'id')
            ->get();

        return view('Configuracion.REQ-CNF-01-02Eventos.datosEventoView', compact('t','t1','id'));
    }
    //código (PT26): Ver actividades, ambientes y materiales de un evento.
    public function verDetallesEvento($id)
    {
        $t = DB::table('actividades')
            ->where('id_evento','=',$id)
            ->select('id','nombre','id_ambiente')
            ->get();
        
        $t1 = DB::table('ambientes')
            ->select('nombre', 'id')
            ->get();
        
        $t2 = DB::table('materiales')
            ->select('nombre', 'id', 'id_actividad')
            ->get();

        return view('Configuracion.REQ-CNF-01-02Eventos.detallesEventoView', compact('t','t1','t2'));
    }
//código (PT15): Vista de crear evento, se muestran opciones de tipo de evento.
    public function mostrarCrearEvento()
    {
        $t = DB::table('tipos_evento')
            ->select('nombre', 'id')
            ->get();
        return view('Configuracion.REQ-CNF-01-02Eventos.crearEventoView', compact('t'));
    }

    //código (PT16): Crear evento y guardar en tabla eventos.
    public function crearEventoGuardar()
    {
        request()->validate([
            'nombre' => 'required',
            'lugar' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date'             
        ]);
        $t = DB::table('tipos_evento')
            ->select('nombre', 'id')
            ->get();
        $datosEvento = request()->except('_token', 'guardar');

        Evento::insert($datosEvento); 
        session()->flash('mensaje','Creación exitosa.');
        return view('Configuracion.REQ-CNF-01-02Eventos.crearEventoView', compact('t'));
    }

    //código (PT17): Vista de adaptar evento, se muestran datos del evento a adaptar y luego del evento adaptado.
    public function mostrarAdaptarEvento($id)
    {
        $t = DB::table('tipos_evento')
            ->select('nombre', 'id')
            ->get();

        $t1 = DB::table('eventos')
            ->where('id','=',$id)
            ->select('id','nombre','lugar','fecha_inicio','fecha_fin','id_tipo_evento')
            ->get();

        $t2 = DB::table('tipos_evento')
            ->where('id','=',$t1->first()->id_tipo_evento)
            ->select('nombre', 'id')
            ->get();
            
        return view('Configuracion.REQ-CNF-01-02Eventos.adaptarEventoView', compact('t','t1','t2','id'));
    }
    //código (PT27): Adaptar de un evento, con sus actividades, ambientes y materiales. Crear nuevo evento con los
    //datos del evento a adaptar.
    public function adaptarEventoGuardar($id_old)
    {
        request()->validate([
            'nombre' => 'required',
            'lugar' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date'             
        ]);
        $datosEvento = request()->except('_token', 'guardar');
        Evento::insert($datosEvento); 
        $id_new_ev = DB::getPdo()->lastInsertId();
        
        $sql = "SELECT * FROM ACTIVIDADES WHERE id_evento = $id_old";
        $actividades = DB::select($sql);
        
        foreach($actividades as $actividad){ //Copiar actividades del evento a adaptar para el nuevo evento
            $datosNewActividad = array([
                'nombre' => $actividad->nombre,
                'fecha' =>  $actividad->fecha,
                'hora' => $actividad->hora,
                'id_evento' => $id_new_ev,
                'id_ambiente' => $actividad->id_ambiente,
                'id_tipo_actividad' => $actividad->id_tipo_actividad,
            ]);
            Actividad::insert($datosNewActividad); 
            $id_new_act = DB::getPdo()->lastInsertId();
            $sql = "SELECT * FROM DTLLES_ACTIVIDAD WHERE id_actividades = $actividad->id";
            $dtlles_actividades = DB::select($sql);
            foreach($dtlles_actividades as $dtlles_actividad){ //Copiar detalles de actividad de actividades del evento a adaptar para el nuevo evento.
                $datosNewDtlle = array([
                    'hora_inicio' => $dtlles_actividad->hora_inicio,
                    'hora_fin' =>  $dtlles_actividad->hora_fin,
                    'id_actividades' => $id_new_act,
                    'id_expositor' => $dtlles_actividad->id_expositor,
                ]);
                Dtlle_actividad::insert($datosNewDtlle); 
            }
            $sql = "SELECT * FROM MATERIALES WHERE id_actividad = $actividad->id";
            $materiales = DB::select($sql);
            foreach($materiales as $material){ //Copiar materiales del evento a adaptar para el nuevo evento.
                $datosNewMaterial = array([
                    'descripcion' => $material->descripcion,
                    'cantidad' =>  $material->cantidad,
                    'nombre' => $material->nombre,
                    'id_actividad' => $id_new_act,
                    'id_tipo_material' => $material->id_tipo_material,
                ]);
                Material::insert($datosNewMaterial); 
            }
        }
        session()->flash('mensaje','Adaptación exitosa.');
        return EventoController::mostrarAdaptarEvento($id_new_ev);
    }

    //código (PT18): Vista de editar evento, se muestran datos del evento.
    public function mostrarEditarEvento($id)
    {
        $t = DB::table('tipos_evento')
            ->select('nombre', 'id')
            ->get();

        $t1 = DB::table('eventos')
            ->where('id','=',$id)
            ->select('id','nombre','lugar','fecha_inicio','fecha_fin','id_tipo_evento')
            ->get();

        $t2 = DB::table('tipos_evento')
            ->where('id','=',$t1->first()->id_tipo_evento)
            ->select('nombre', 'id')
            ->get();
        
        return view('Configuracion.REQ-CNF-01-02Eventos.editarEventoView', compact('t','t1','t2','id'));
    }
    //código (PT28): Editar datos de un evento y actualizarlos en tabla eventos.
    public function editarEventoGuardar($id)
    {
        request()->validate([
            'nombre' => 'required',
            'lugar' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date'             
        ]);
        DB::table('eventos')
            ->where('id',$id)
            ->update([
                'nombre'=>request()->input('nombre'),
                'lugar'=>request()->input('lugar'),
                'fecha_inicio'=>request()->input('fecha_inicio'),
                'fecha_fin'=>request()->input('fecha_fin'),
                'id_tipo_evento'=>request()->input('id_tipo_evento'),
        ]);
        session()->flash('mensaje','Modificación exitosa.');
        return EventoController::mostrarEditarEvento($id);
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
