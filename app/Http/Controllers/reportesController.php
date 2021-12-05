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
        $t = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id')
            ->get();

        return view('reportesView', compact('t'));
    }
}
