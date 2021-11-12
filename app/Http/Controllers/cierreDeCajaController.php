<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CierreDeCajaController extends Controller
{
    public function CDCevento(){//"Cierre de Caja por Evento";
        // $t = DB::table('asistencias')
        //     ->join('inscripciones', 'inscripciones.id', '=', 'asistencias.id_inscripciones')
        //     ->join('usuarios', 'usuarios.id', '=', 'inscripciones.id_usuario')
        //     ->join('actividades', 'actividades.id', '=', 'asistencias.id_actividades')
        //     ->select('usuarios.nombre as unombre', 'usuarios.apellido', 'asistencias.hora', 'actividades.nombre as anombre')
        //     ->where('usuarios.id', '=', $inscrito)
        //     ->get();
        //return view('Inscritos.showInscritoView', compact('t'));
        return view('CierreDeCaja.CDCeventoView', compact('t'));
    }
    public function CDCdiario(){//"Cierre de Caja diario";
        return view('CierreDeCaja.CDCdiarioView');
    }
}
