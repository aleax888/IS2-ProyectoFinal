<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

// código de controlador (CD10)
class AmbienteController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //código (PT29): Ver toda la lista de ambientes existentes.
    public function verAmbientes()
    {
        $t = DB::table('ambientes')
            ->select('nombre', 'id')
            ->get();

        return view('Configuracion.REQ-CNF-03-04Ambientes.ambientesView', compact('t'));
    }
    //código (PT30): Ver datos de un ambiente en particular (nombre, ubicación, capacidad).
    public function verDatosAmbiente($id)
    {
        $t = DB::table('ambientes')
            ->where('id','=',$id)
            ->select('id','nombre','ubicacion','capacidad')
            ->get();
        return view('Configuracion.REQ-CNF-03-04Ambientes.datosAmbienteView', compact('t'));
    }
    //código (PT31): Redirigir a vista CrearAmbiente.
    public function mostrarCrearAmbiente()
    {
        return view('Configuracion.REQ-CNF-03-04Ambientes.crearAmbienteView');
    }
    //código (PT31): Crear ambiente y guardar en tabla ambientes.
    public function crearAmbienteGuardar()
    {        
        request()->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'capacidad' => 'required'           
        ]);
        $datosAmbiente = request()->except('_token', 'guardar');
        Ambiente::insert($datosAmbiente); 
        session()->flash('mensaje','Creación exitosa.');
        return view('Configuracion.REQ-CNF-03-04Ambientes.crearAmbienteView');
    }
    //código (PT32): Vista de editar ambiente, se muestran datos del ambiente.
    public function mostrarEditarAmbiente($id)
    {         
        $t = DB::table('ambientes')
            ->where('id','=',$id)
            ->select('id','nombre','ubicacion','capacidad')
            ->get();
        return view('Configuracion.REQ-CNF-03-04Ambientes.editarAmbienteView', compact('t','id'));
    }
    //código (PT33): Editar datos de un ambiente y actualizarlos en tabla ambientes.
    public function editarAmbienteGuardar($id)
    {
        request()->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'capacidad' => 'required'           
        ]);
        DB::table('ambientes')
            ->where('id',$id)
            ->update([
                'nombre'=>request()->input('nombre'),
                'ubicacion'=>request()->input('ubicacion'),
                'capacidad'=>request()->input('capacidad'),
        ]);
        session()->flash('mensaje','Modificación exitosa.');
        return AmbienteController::mostrarEditarAmbiente($id);
    }
    //código (PT34): Vista de adaptar ambiente, se muestran datos del ambiente a adaptar y luego del ambiente adaptado.
    public function mostrarAdaptarAmbiente($id)
    {    
        $t = DB::table('ambientes')
            ->where('id','=',$id)
            ->select('id','nombre','ubicacion','capacidad')
            ->get();

        return view('Configuracion.REQ-CNF-03-04Ambientes.adaptarAmbienteView', compact('t','id'));
    }
    //código (PT35): Adaptar de un ambiente. Crear nuevo ambiente.
    public function adaptarAmbienteGuardar()
    {
        request()->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'capacidad' => 'required'           
        ]);
        $datosAmbiente = request()->except('_token', 'guardar');
        Ambiente::insert($datosAmbiente); 
        $id = DB::getPdo()->lastInsertId();
        session()->flash('mensaje','Adaptación exitosa.');
        return AmbienteController::mostrarAdaptarAmbiente($id);
    }
}
