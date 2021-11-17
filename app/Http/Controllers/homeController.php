<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\ReportesController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke($rol){
        $model = ReportesController::class;

        if ($rol == "Participante")
            return "Participante";
        if ($rol == "Colaborador")
            return "Colaborador";
        if ($rol == "Administrador")
            return view('administradorPerfilView');
        if ($rol == "Encargado")
            return "Encargado";
    }
}
