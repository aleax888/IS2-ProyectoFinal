<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscritosController extends Controller
{
    public function __invoke(){
        return view('Inscritos.inscritosView');//"Inscritos";
    }

    public function showInscrito($inscrito){
        return view('Inscritos.showInscritoView', compact('inscrito'));//"asistencia de $inscrito";
    }

    public function showQR($inscrito){
        return view('Inscritos.showQRView', compact('inscrito'));//"QR de $inscrito";
    }
}
