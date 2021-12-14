<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Dtlle_actividad;
use App\Models\Expositor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

// código de controlador (CD14)
class ActividadController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //código (PT36): Ver toda la lista de actividades existentes.
    public function verActividades()
    {
        $t = DB::table('actividades')
            ->select('nombre', 'id')
            ->get();

        return view('Configuracion.REQ-CNF-05-07Actividades.actividadesView', compact('t'));
    }
    //código (PT37): Ver datos de una actividad en particular (nombre, fecha, hora, evento, ambiente, tipo).
    public function verDatosActividad($id)
    {
        $t = DB::table('actividades')
            ->where('id','=',$id)
            ->select('id','nombre','fecha','hora','id_evento','id_ambiente','id_tipo_actividad')
            ->get();
        $t1 = DB::table('eventos')
            ->where('id','=',$t->first()->id_evento)
            ->select('nombre', 'id')
            ->get();
        $t2 = DB::table('ambientes')
            ->where('id','=',$t->first()->id_ambiente)
            ->select('nombre', 'id')
            ->get();
        $t3 = DB::table('tipos_actividad')
            ->where('id','=',$t->first()->id_tipo_actividad)
            ->select('nombre', 'id')
            ->get();
        $t4 = DB::table('dtlles_actividad')
            ->where('id_actividades','=',$t->first()->id)
            ->select('hora_inicio', 'hora_fin', 'id_expositor')
            ->get();
        $t5 = DB::table('expositores')
            ->where('id','=',$t4->first()->id_expositor)
            ->select('id', 'nombre')
            ->get();
        return view('Configuracion.REQ-CNF-05-07Actividades.datosActividadView', compact('t','t1','t2','t3','t4','t5'));
    }
    //código (PT38): Vista de crear actividad, se muestran opciones de tipo de actividad, eventos, ambientes.
    public function mostrarCrearActividad()
    {
        $t = DB::table('tipos_actividad')
            ->select('nombre', 'id')
            ->get();
        $t1 = DB::table('eventos')
            ->select('nombre', 'id')
            ->get();
        $t2 = DB::table('ambientes')
            ->select('nombre', 'id')
            ->get();

        return view('Configuracion.REQ-CNF-05-07Actividades.crearActividadView', compact('t','t1','t2'));
    }
    //código (PT39): Crear actividad y guardar en tabla actividades.
    public function crearActividadGuardar()
    {
        request()->validate([
            'nombre' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'expositor' => 'required'           
        ]);
        $t = DB::table('tipos_actividad')
            ->select('nombre', 'id')
            ->get();
        $t1 = DB::table('eventos')
            ->select('nombre', 'id')
            ->get();
        $t2 = DB::table('ambientes')
            ->select('nombre', 'id')
            ->get();

        $datosActividad = request()->only('nombre','fecha','hora','id_evento','id_ambiente','id_tipo_actividad');
        Actividad::insert($datosActividad); 
        $id_act = DB::getPdo()->lastInsertId();
        $expositor = request()->only('expositor');
        $datoExpositor = array([
            'nombre' => $expositor['expositor'],
        ]);
        Expositor::insert($datoExpositor); //Guardar expositor de la actividad.
        $id_exp = DB::getPdo()->lastInsertId();
        $dtlleActividad = array([
            'hora_inicio' => $datosActividad['hora'],
            'hora_fin' => $datosActividad['hora'],
            'id_actividades' => $id_act,
            'id_expositor' => $id_exp,
        ]);
        Dtlle_actividad::insert($dtlleActividad); //Guardar detalle de actividad con expositor y actividad.
        session()->flash('mensaje','Creación exitosa.');
        return view('Configuracion.REQ-CNF-05-07Actividades.crearActividadView', compact('t','t1','t2'));
    }
    //código (PT40): Vista de editar actividad, se muestran datos de la actividad.
    public function mostrarEditarActividad($id)
    {        
        $t = DB::table('actividades')
            ->where('id','=',$id)
            ->select('id','nombre','fecha','hora','id_evento','id_ambiente','id_tipo_actividad')
            ->get();
        $t1 = DB::table('eventos')
            ->where('id','=',$t->first()->id_evento)
            ->select('nombre', 'id')
            ->get();
        $t2 = DB::table('ambientes')
            ->where('id','=',$t->first()->id_ambiente)
            ->select('nombre', 'id')
            ->get();
        $t3 = DB::table('tipos_actividad')
            ->where('id','=',$t->first()->id_tipo_actividad)
            ->select('nombre', 'id')
            ->get();
        $t4 = DB::table('tipos_actividad')
            ->select('nombre', 'id')
            ->get();
        $t5 = DB::table('eventos')
            ->select('nombre', 'id')
            ->get();
        $t6 = DB::table('ambientes')
            ->select('nombre', 'id')
            ->get();
        $t7 = DB::table('dtlles_actividad')
            ->where('id_actividades','=',$t->first()->id)
            ->select('id_expositor')
            ->get();
        $t8 = DB::table('expositores')
            ->where('id','=',$t7->first()->id_expositor)
            ->select('nombre', 'id')
            ->get();
        return view('Configuracion.REQ-CNF-05-07Actividades.editarActividadView', compact('t','t1','t2','t3','t4','t5','t6','t8','id'));
    }
    //código (PT41): Editar datos de una actividad y actualizarlos en tabla actividades.
    public function editarActividadGuardar($id)
    {
        request()->validate([
            'nombre' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'expositor' => 'required'              
        ]);
        DB::table('actividades')
            ->where('id',$id)
            ->update([
                'nombre'=>request()->input('nombre'),
                'fecha'=>request()->input('fecha'),
                'hora'=>request()->input('hora'),
                'id_evento'=>request()->input('id_evento'),
                'id_ambiente'=>request()->input('id_ambiente'),
                'id_tipo_actividad'=>request()->input('id_tipo_actividad'),
            ]);
        $t = DB::table('dtlles_actividad')
            ->where('id_actividades','=',$id)
            ->select('id_expositor')
            ->get();
        DB::table('expositores')
            ->where('id','=',$t->first()->id_expositor)
            ->update([
                'nombre' => request()->input('expositor'),
            ]);
        session()->flash('mensaje','Modificación exitosa.');
        return ActividadController::mostrarEditarActividad($id);
    }
}
