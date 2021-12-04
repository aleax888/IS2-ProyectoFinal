<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

// codigo de controlador (CD07)
class ReportesController extends Controller
{
    // codigo (PT01)
    public function __invoke(){//"Pagina Reportes";
        $t1 = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id')
            ->get();
        $t2 = DB::table('gastos')
            ->select('gastos.fecha')
            ->groupBy('gastos.fecha')
            ->get();
        return view('reportesView', compact('t1', 't2'));
    }
}
