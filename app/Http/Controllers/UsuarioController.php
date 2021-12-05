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
            return view('participantePerfilView');
        if ($rol == "Colaborador")
            return view('colaboradorPerfilView');
        if ($rol == "Administrador")
            return view('administradorPerfilView');
        if ($rol == "Encargado")
            return view('encargadoPerfilView');
    }

    //codigo (PT11)
    public function listarEventos()
    {
        $t = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id')
            //->where('eventos.id_usuario','=',$id)
            ->get();
        return view('responsabilidadesView', compact('t'));
    }

    public function listarEventos2()
    {
        $t = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id')
            //->where('eventos.id_usuario','=',$id)
            ->get();
        return view('eventosPreView', compact('t'));
    }

    public function preins($id_evento)
    {
        $t = DB::table('eventos')
            ->select('id', 'nombre', 'lugar', 'fecha_inicio', 'fecha_fin')
            ->where('id','=',$id_evento)
            ->get();
        return view('preinscripcionView', compact('t'));
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
        return view('tomaDeAsistenciaView', compact('t'));
    }

    //codigo (PT13)
    public function materialesAmbiente()
    {
        $t = DB::table('materiales')
            ->select('materiales.nombre', 'materiales.id')
            ->get();
            
        return view('entregaDeMaterialAmbienteView', compact('t'));
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
