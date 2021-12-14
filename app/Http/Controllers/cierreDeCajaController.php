<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
//use App\Http\Controllers\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\reportesController;

// codigo de controlador (CD01)
class CierreDeCajaController extends Controller
{
    // codigo (PT02)
    public function CDCevento($id_Evento){//"Cierre de Caja por Evento";
        $ti = DB::table('ingresos')
            ->select('monto', 'fecha')
            ->where('id_evento', '=', $id_Evento)
            ->get();
        $tg = DB::table('gastos')
            ->select('gastos.monto', 'gastos.fecha', 'gastos.descripcion', 'gastos.evidencia', 'tipos_gasto.nombre') 
            ->join('tipos_gasto','tipos_gasto.id','=','gastos.id_tipos_gasto')
            ->where('id_evento', '=', $id_Evento)
            ->get();

            $t = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id')
            ->get();

        // $t = DB::table('gastos')
        //     ->join('eventos', 'eventos.id', '=', 'gastos.id_evento')
        //     ->join('ingresos', 'ingresos.id_evento', '=', 'eventos.id')
        //     ->select('gastos.monto as gmonto', 'ingresos.monto as imonto', 'gastos.fecha', 'eventos.nombre')
        //     ->where('eventos.id', '=', $idEvento)
        //     ->get();

        if(!empty($ti[0]) and !empty($tg[0])){
            return view('Reportes.CDCeventoView', compact('ti', 'tg','t'));
        }
        
        
        return view('Reportes.reportesView', compact('ti', 'tg','t'));
    }
    
    // codigo (PT03)
    public function CDCdiario($fecha){//"Cierre de Caja diario";

        $ti = DB::table('ingresos')
            ->select('monto', 'fecha')
            ->where('fecha', '=', $fecha)
            ->get();
        $tg = DB::table('gastos')
            ->select('gastos.monto', 'gastos.fecha', 'gastos.descripcion', 'gastos.evidencia', 'tipos_gasto.nombre') 
            ->join('tipos_gasto','tipos_gasto.id','=','gastos.id_tipos_gasto')
            ->where('fecha', '=', $fecha)
            ->get();


        // $t = DB::table('gastos')
        // ->join('eventos', 'eventos.id', '=', 'gastos.id_evento')
        // ->join('ingresos', 'ingresos.id_evento', '=', 'eventos.id')
        // ->select('gastos.monto as gmonto', 'ingresos.monto as imonto', 'gastos.fecha', 'eventos.nombre')
        // ->where('gastos.fecha', '=', $fecha)
        // ->get();
        //if (!$t->isEmpty()) {return view('CierreDeCaja.CDCdiarioView', compact('t'));}
        return view('Reportes.CDCdiarioView', compact('ti','tg','fecha'));
    }
}
