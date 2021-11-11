<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CierreDeCajaController extends Controller
{
    public function CDCevento(){
        return view('CierreDeCaja.CDCeventoView');//"Cierre de Caja por Evento";
    }
    public function CDCdiario(){
        return view('CierreDeCaja.CDCdiarioView');//"Cierre de Caja diario";
    }
}
