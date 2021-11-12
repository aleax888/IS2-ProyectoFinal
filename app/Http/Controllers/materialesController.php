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
            ->join('asistencias', 'paquetes.id', '=', 'inscripciones.id_paquete')
            ->select('usuarios.nombre as unombre', 'usuarios.apellido', 'paquetes.nombre as pnombre', 'inscripciones.tipos_inscrito', 'inscripciones.createdfecha_inscripcion')
            ->get();
        return view('Inscritos.inscritosView', compact('t'));
        return view('materialesView');;
    }
}
