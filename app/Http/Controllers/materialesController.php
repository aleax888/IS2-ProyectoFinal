<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Support\Facades\DB;

// codigo de controlador (CD06)
class MaterialesController extends Controller
{
    //codigo (PT09)
    public function __invoke(){
        $t = DB::table('materiales')
            ->join('actividades', 'actividades.id', '=', 'materiales.id_actividad')
            ->join('asistencias', 'asistencias.id_actividades', '=', 'actividades.id')
            ->select('materiales.nombre', 'materiales.cantidad', 'asistencias.cantidad_material', 'asistencias.fecha')
            ->get();
        return view('Reportes.materialesView', compact('t'));
    }

    //código (PT42): Ver toda la lista de materiales existentes.
    public function verMateriales()
    {
        $t = DB::table('materiales')
            ->select('nombre', 'id')
            ->get();

        return view('Configuracion.REQ-CNF-08Materiales.materialesView', compact('t'));
    }
    //código (PT43): Ver datos de un material en particular (nombre, descripción, cantidad, actividad, tipo).
    public function verDatosMaterial($id)
    {
        $t = DB::table('materiales')
            ->where('id','=',$id)
            ->select('id','nombre','descripcion','cantidad','id_actividad','id_tipo_material')
            ->get();
        $t1 = DB::table('actividades')
            ->where('id','=',$t->first()->id_actividad)
            ->select('nombre', 'id')
            ->get();
        $t2 = DB::table('tipos_material')
            ->where('id','=',$t->first()->id_tipo_material)
            ->select('nombre', 'id')
            ->get();
        return view('Configuracion.REQ-CNF-08Materiales.datosMaterialView', compact('t','t1','t2'));
    }
    //código (PT44): Vista de crear material, se muestran opciones de tipo de material, actividades.
    public function mostrarCrearMaterial()
    {
        $t = DB::table('tipos_material')
            ->select('nombre', 'id')
            ->get();
        $t1 = DB::table('actividades')
            ->select('nombre', 'id')
            ->get();

        return view('Configuracion.REQ-CNF-08Materiales.crearMaterialView', compact('t','t1'));
    }
    //código (PT45): Crear material y guardar en tabla materiales.
    public function crearMaterialGuardar()
    {        
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required'           
        ]);
        $t = DB::table('tipos_material')
            ->select('nombre', 'id')
            ->get();
        $t1 = DB::table('actividades')
            ->select('nombre', 'id')
            ->get();

        $datosMaterial = request()->except('_token', 'guardar');
 
        Material::insert($datosMaterial); 
        session()->flash('mensaje','Creación exitosa.');
        return view('Configuracion.REQ-CNF-08Materiales.crearMaterialView', compact('t','t1'));
    }
    //código (PT46): Vista de editar material, se muestran datos del material.
    public function mostrarEditarMaterial($id)
    {        
        $t = DB::table('materiales')
            ->where('id','=',$id)
            ->select('id','nombre','descripcion','cantidad','id_actividad','id_tipo_material')
            ->get();
        $t1 = DB::table('actividades')
            ->where('id','=',$t->first()->id_actividad)
            ->select('nombre', 'id')
            ->get();
        $t2 = DB::table('tipos_material')
            ->where('id','=',$t->first()->id_tipo_material)
            ->select('nombre', 'id')
            ->get();
        $t3 = DB::table('actividades')
            ->select('nombre', 'id')
            ->get();
        $t4 = DB::table('tipos_material')
            ->select('nombre', 'id')
            ->get();
        return view('Configuracion.REQ-CNF-08Materiales.editarMaterialView', compact('t','t1','t2','t3','t4','id'));
    }
    //código (PT47): Editar datos de un material y actualizarlos en tabla materiales.
    public function editarMaterialGuardar($id)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required'           
        ]);
        DB::table('materiales')
            ->where('id',$id)
            ->update([
                'nombre'=>request()->input('nombre'),
                'descripcion'=>request()->input('descripcion'),
                'cantidad'=>request()->input('cantidad'),
                'id_actividad'=>request()->input('id_actividad'),
                'id_tipo_material'=>request()->input('id_tipo_material'),
        ]);
        session()->flash('mensaje','Modificación exitosa.');
        return MaterialesController::mostrarEditarMaterial($id);
    }
    
}
