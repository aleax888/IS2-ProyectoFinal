<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\ReportesController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(){//"Cierre de Caja por Evento";

        return view('Sesion.homeView');
    }

    public function login(){//"Cierre de Caja por Evento";
        
        return view('Sesion.loginView');
    }

    public function register(){//"Cierre de Caja por Evento";
        
        return view('Sesion.registerView');
    }
}
