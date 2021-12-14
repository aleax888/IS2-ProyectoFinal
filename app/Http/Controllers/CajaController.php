<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CajaController extends Controller
{
    public function caja($id_usuario)
    {
        $t = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id')
            ->get();
        return view('Caja.cajaView', compact('t', 'id_usuario'));
    }

    public function verTransacciones($id_evento, $id_usuario)
    {
        $ti = DB::table('ingresos')
            ->select('monto', 'fecha')
            ->where('id_evento', '=', $id_evento)
            ->get();
        $tg = DB::table('gastos')
            ->select('gastos.monto', 'gastos.fecha', 'gastos.descripcion', 'gastos.evidencia', 'tipos_gasto.nombre') 
            ->join('tipos_gasto','tipos_gasto.id','=','gastos.id_tipos_gasto')
            ->where('id_evento', '=', $id_evento)
            ->get();
        $enombre = DB::table('eventos')
            ->select('nombre', 'id')
            ->where('id', '=', $id_evento)
            ->get();
        return view('Caja.verTransaccionesView', compact('ti','tg', 'enombre', 'id_usuario'));
    }

    public function registrarGasto($id_evento, $id_usuario)
    {
        $t = DB::table('tipos_gasto')
            ->select('nombre', 'id')
            ->get();
        return view('Caja.registrarGastoView', compact('t','id_evento', 'id_usuario'));
    }

    public function registrarGastoGuardar($id_evento, $id_usuario)
    {
        $datos = request()->except('_token', 'guardar');
        DB::table('gastos')->insert([
            'fecha' => date('y-m-d'),
            'descripcion' => $datos['descripcion'],
            'monto' => $datos['monto'],
            'evidencia' => $datos['evidencia'],
            'id_evento' => $id_evento,
            'id_usuario' => $id_usuario,
            'id_tipos_gasto' => $datos['id_tg'],
        ]);
        return CajaController::registrarGasto($id_evento, $id_usuario);
    }
}
