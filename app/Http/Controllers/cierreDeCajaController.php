<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
//use App\Http\Controllers\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


// codigo de controlador (CD01)
class CierreDeCajaController extends Controller
{
    // codigo (PT02)
    public function CDCevento($idEvento){//"Cierre de Caja por Evento";
        $t = DB::table('gastos')
            ->join('eventos', 'eventos.id', '=', 'gastos.id_evento')
            ->join('ingresos', 'ingresos.id_evento', '=', 'eventos.id')
            ->select('gastos.monto as gmonto', 'ingresos.monto as imonto', 'gastos.fecha', 'eventos.nombre')
            ->where('eventos.id', '=', $idEvento)
            ->get();
        return view('Reportes.CDCeventoView', compact('t'));
    }
    
    // codigo (PT03)
    public function CDCdiario($fecha){//"Cierre de Caja diario";
        $t = DB::table('gastos')
            ->join('eventos', 'eventos.id', '=', 'gastos.id_evento')
            ->join('ingresos', 'ingresos.id_evento', '=', 'eventos.id')
            ->select('gastos.monto as gmonto', 'ingresos.monto as imonto', 'gastos.fecha', 'eventos.nombre')
            ->where('gastos.fecha', '=', $fecha)
            ->get();
        //if (!$t->isEmpty()) {return view('CierreDeCaja.CDCdiarioView', compact('t'));}
        return view('Reportes.CDCdiarioView', compact('t', 'fecha'));
    }
}
