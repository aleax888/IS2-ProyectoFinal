<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class configuracionController extends Controller
{
    // codigo (PT04)
    public function __invoke()
    {
        $t = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id')
            ->get();
        return view('configuracionView', compact('t'));
    }
}
