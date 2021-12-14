<?php

namespace App\Http\Controllers;

use App\Models\Comite;
use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

// codigo de controlador (CD04)
class EventoController extends Controller
{

    //codigo (PT15)
    public function crearEvento()
    {
        $t = DB::table('tipos_evento')
            ->select('tipos_evento.nombre', 'tipos_evento.id')
            ->get();
        return view('Configuracion.crearEventoView', compact('t'));
    }

    //codigo (PT16)
    public function crearEventoGuardar()
    {
        $t = DB::table('tipos_evento')
            ->select('tipos_evento.nombre', 'tipos_evento.id')
            ->get();
        $datosEvento = request()->except('_token', 'guardar');

        Evento::insert($datosEvento); 
        
        return view('Configuracion.crearEventoView', compact('t'));
    }

    //codigo (PT17)
    public function adaptarEvento()
    {
        return view('Configuracion.adaptarEventoView');
    }

    //codigo (PT18)
    public function editarEvento()
    {
        return view('Configuracion.editarEventoView');
    }


    //Controladores Gestion Administrativa
    public function ShowEventosGestionAdministrativa(){
        $datosEvento = DB::table('eventos')
        ->select('eventos.id','eventos.nombre','eventos.lugar','eventos.fecha_inicio','fecha_fin')
        ->get();
        return view('gestion_administrativa.index',compact(['datosEvento']));
    }

    public function ShowMenuGestionAdministrativa($evento_id){
        $datosComite = DB::table('comites')
        ->select('*')
        ->where('comites.id_evento','=',$evento_id )
        ->get();
        
        $datosUsuario = DB::table('usuarios')
        ->select('usuarios.id as uid','usuarios.nombre as unombre', 'usuarios.apellido', 'usuarios.email', 'roles.nombre as rnombre', 'roles.id as rid')
        ->join('inscripciones', 'usuarios.id', 'inscripciones.id_usuario')
        ->join('roles', 'usuarios.id_rol', 'roles.id')
        ->where('inscripciones.id_evento','=', $evento_id)
        ->get();

        $roles = DB::table('roles')
        ->select('*')
        ->get();
        //$dataEvento = Evento::findOrFail($Eventoid);
        //return dd($datosEvento);
        //dd($datosComite);
        //dd($datosUsuario);
        return view('gestion_administrativa.menu', compact(['datosComite','evento_id','datosUsuario', 'roles']));
    }

        //codigo (PT23)
    public function GuardarComite(Request $datosComite){
        
        //$datosComite = request()->except(['_token','guardar']);
        DB::table('comites')->insert(['nombre' => $datosComite->nombre, 'nro_inte' => $datosComite->nro_inte, 'id_evento' => $datosComite->id_evento]);
        return EventoController::ShowMenuGestionAdministrativa($datosComite->id_evento);
        //Comite::insert($datosComite); 
        
        //return EventoController::Show();
    }

    public function EliminarComite($id_comite, $id_evento){
        $aux = DB::table('codigos')->where('id_comite',$id_comite)->get();
        if(!empty($aux[0])){
            DB::table('codigos')->where('id_comite', $id_comite)->delete();
        }
        DB::table('comites')->where('id', $id_comite)->delete();

        return EventoController::ShowMenuGestionAdministrativa($id_evento);
    }

    public function EditarRol(Request $datosUsuario, $id_evento){
        //return $datosUsuario;
        
        if($datosUsuario->actualRolID === $datosUsuario->Rol){
            return EventoController::ShowMenuGestionAdministrativa($id_evento);
        }
        
        DB::table('Usuarios')
        ->where('id', $datosUsuario->id_usuario)
        ->update(array('id_rol'=>$datosUsuario->Rol));

        return EventoController::ShowMenuGestionAdministrativa($id_evento);
    }

    public function EditarComite(Request $datosComite){
        DB::table('Comites')
        ->where('id',$datosComite->id_comite)
        ->update(array('nombre'=>$datosComite->nombre, 'nro_inte'=>$datosComite->Nro_inte));

        return EventoController::ShowMenuGestionAdministrativa($datosComite->id_evento);
    }
}