<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MaterialesController extends Controller
{
    public function __invoke(){
        $t = DB::table('materiales')
            ->join('actividades', 'actividades.id', '=', 'materiales.id_actividad')
            ->join('asistencias', 'asistencias.id_actividades', '=', 'actividades.id')
            ->select('materiales.nombre', 'materiales.cantidad', 'asistencias.material', 'asistencias.hora')
            ->get();
        return view('materialesView', compact('t'));
    }
}
