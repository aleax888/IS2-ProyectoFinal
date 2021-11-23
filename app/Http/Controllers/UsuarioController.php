<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
    

    public function index()
    {
        //
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
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
