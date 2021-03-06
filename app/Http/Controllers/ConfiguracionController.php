<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

// codigo de controlador (CD03)
class configuracionController extends Controller
{
    // codigo (PT04)
    public function __invoke()
    {
        $t = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id')
            ->get();
        return view('Configuracion.configuracionView', compact('t'));
    }
}
