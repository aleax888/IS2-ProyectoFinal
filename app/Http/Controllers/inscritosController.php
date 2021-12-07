<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Usuario;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InscritosController extends Controller
{
    //codigo (PT06)
    public function __invoke(){//"Inscritos";
        $t = DB::table('inscripciones')
            ->join('usuarios', 'usuarios.id', '=', 'inscripciones.id_usuario')
            ->join('eventos', 'eventos.id', '=', 'inscripciones.id_evento')
            ->join('paquetes', 'paquetes.id', '=', 'inscripciones.id_paquete')
            ->join('tipos_inscrito', 'tipos_inscrito.id', '=', 'inscripciones.id_tipo_inscrito')
            ->select('usuarios.nombre as unombre', 'usuarios.apellido', 'paquetes.nombre as pnombre'
                    , 'tipos_inscrito.nombre as tinombre', 'inscripciones.fecha_inscripcion'
                    , 'eventos.nombre as enombre', 'usuarios.id', 'usuarios.QR')
            ->get();
        return view('Inscritos.inscritosView', compact('t'));
    }

    //codigo (PT07) 
    //Esta Funcion consulta por los inscritos en la base de datos
    public function showInscrito($inscrito){//"asistencia de $inscrito";
        $t = DB::table('asistencias')
            ->join('inscripciones', 'inscripciones.id', '=', 'asistencias.id_inscripciones')
            ->join('usuarios', 'usuarios.id', '=', 'inscripciones.id_usuario')
            ->join('actividades', 'actividades.id', '=', 'asistencias.id_actividades')
            ->select('usuarios.nombre as unombre', 'usuarios.apellido', 'asistencias.hora', 'actividades.nombre as anombre')
            ->where('usuarios.id', '=', $inscrito)
            ->get();
        return view('Inscritos.showInscritoView', compact('t'));
    }

    //codigo (PT08)
    public function showQR($inscrito){//"QR de $inscrito";
        $t = DB::table('usuarios')
            ->select('usuarios.nombre as unombre', 'usuarios.QR')
            ->where('usuarios.id', '=', $inscrito)
            ->get();

        return view('Inscritos.showQRView', compact('t'));
    }
}
