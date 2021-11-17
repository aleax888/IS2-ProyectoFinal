<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    public function __invoke(){//"Pagina Reportes";
        $t1 = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id')
            ->get();
        $t2 = DB::table('gastos')
            ->select('gastos.fecha')
            ->get();
        return view('reportesView', compact('t1', 't2'));
    }
}
