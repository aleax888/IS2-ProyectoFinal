<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
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
        return view('materialesView', compact('t'));
    }
}
