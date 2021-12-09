<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

// codigo de controlador (CD09)
class UsuarioController extends Controller
{
    //codigo (PT10)
    public function __invoke($rol)
    {
        $model = ReportesController::class;

        if ($rol == "Participante")
            return view('Perfiles.participantePerfilView');
        if ($rol == "Colaborador")
            return view('Perfiles.colaboradorPerfilView');
        if ($rol == "Administrador")
            return view('Perfiles.administradorPerfilView');
        if ($rol == "Encargado")
            return view('Perfiles.encargadoPerfilView');
    }

    //codigo (PT11)
    public function listarEventos()
    {
        $t = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id')
            //->where('eventos.id_usuario','=',$id)
            ->get();
        return view('Asistencia.responsabilidadesView', compact('t'));
    }

    public function listarEventos2($id_usuario)
    {
        $t = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id', DB::raw("(CASE 
            WHEN (SELECT id_evento from preinscripciones 
                WHERE id_usuario ='$id_usuario'and id_evento = eventos.id) 
                THEN 1 
            ELSE 0 
            END) as pre"))
            ->get();

        return view('Inscripciones.eventosPreView', compact('t', 'id_usuario'));
    }

    public function preins()
    {
        $datos = request()->except('_token', 'guardar');
        $id_usuario = request()->input('idu');
        DB::table('preinscripciones')->insert([
            'fecha_preinscripcion' => date('y-m-d'),
            'id_evento' => $datos['ide'],
            'id_usuario' => $datos['idu'],
            
        ]);
        
        $t = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id', DB::raw("(CASE 
            WHEN (SELECT id_evento from preinscripciones 
                WHERE id_usuario ='$id_usuario'and id_evento = eventos.id) 
                THEN 1 
            ELSE 0 
            END) as pre"))
            ->get();

        return view('Inscripciones.eventosPreView', compact('t', 'id_usuario'));
    }

    public function verPreinscripciones($id_usuario)
    {
        $t = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id', 'preinscripciones.id_usuario')
            ->join('preinscripciones','preinscripciones.id_evento','=','eventos.id')
            ->where('preinscripciones.id_usuario', '=',$id_usuario)
            ->get();

        return view('Inscripciones.preinscripcionesView', compact('t', 'id_usuario'));
    }

    public function inscripcion($id_usuario, $id_evento)
    {
        $te = DB::table('eventos')
            ->select('nombre', 'id')
            ->where('id','=',$id_evento)
            ->get();
        
        $ti = DB::table('tipos_inscrito')
            ->select('id','nombre')
            ->get();
        
        $tpa = DB::table('paquetes')
            ->select('id','nombre', 'precio')
            ->get();
        
        $tpr = DB::table('promociones')
            ->select('id','nombre', 'descuento')
            ->get();
        
        return view('Inscripciones.inscripcionView', compact('id_usuario', 'te', 'ti', 'tpa', 'tpr'));
    }

    //codigo (PT12)
    public function tomarAsistencia($id_evento)
    {
        $t = DB::table('inscripciones')
            ->join('usuarios','usuarios.id','=','inscripciones.id_usuario')
            ->join('eventos','eventos.id','=','inscripciones.id_evento')
            ->where('eventos.id','=',$id_evento)
            ->select('eventos.nombre as evento', 'eventos.id', 'usuarios.nombre as unombre', 'usuarios.apellido')
            ->get();
        return view('Asistencia.tomaDeAsistenciaView', compact('t'));
    }

    //codigo (PT13)
    public function materialesAmbiente()
    {
        $t = DB::table('materiales')
            ->select('materiales.nombre', 'materiales.id')
            ->get();
            
        return view('Asistencia.entregaDeMaterialAmbienteView', compact('t'));
    }
    
    //codigo (PT14)
    public function mostrarUsuarios()
    {
        $rol = Rol::all();
        $rolData = array("lista_roles" => $rol);
        $datosUsuario['datosUsuario'] = Usuario::paginate(5);
        return view('gestion_administrativa.gestionar_roles',$datosUsuario, $rolData);
    }
}
