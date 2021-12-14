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
    public function listarEventos($id_usuario)
    {
        $t = DB::table('inscripciones')
            ->select('eventos.nombre', 'eventos.id')
            ->join('eventos', 'eventos.id','=','inscripciones.id_evento')
            ->where('inscripciones.id_usuario','=',$id_usuario)
            ->where('inscripciones.id_tipo_inscrito','=',3)
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
        return UsuarioController::listarEventos2($id_usuario);
    }

    public function verPreinscripciones($id_usuario)
    {
        $t = DB::table('eventos')
            ->select('eventos.nombre', 'eventos.id', 'preinscripciones.id_usuario', DB::raw("(CASE 
            WHEN (SELECT id_evento from inscripciones 
                WHERE id_usuario ='$id_usuario'and id_evento = eventos.id) 
                THEN 1 
            ELSE 0 
            END) as v"))
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

    public function inscripcionGuardar($id_usuario, $id_evento)
    {
        $datos = request()->except('_token', 'guardar');
        
        
        $mpr = DB::table('promociones')
            ->select('descuento')
            ->where('id','=',$datos['tpr'])
            ->get();

        $mpa = DB::table('paquetes')
            ->select('precio')
            ->where('id','=',$datos['tpa'])
            ->get();
        $m = $mpa[0]->precio - $mpr[0]->descuento;
        
        DB::table('ingresos')->insert([
            'num_transaccion' => rand(10000, 99999),
            'fecha' => date('y-m-d'),
            'monto' => $m,
            'id_evento' => $id_evento,
        ]);
        
        DB::table('inscripciones')->insert([
            'fecha_inscripcion' => date('y-m-d'),
            'id_paquete' => $datos['tpa'],
            'id_evento' => $id_evento,
            'id_usuario' => $id_usuario,
            'id_tipo_inscrito' => $datos['ti'],   
        ]);
            

        return UsuarioController::verPreinscripciones($id_usuario);
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
            ->select('materiales.nombre', 'materiales.id', 'materiales.cantidad', 'materiales.descripcion','tipos_material.nombre as t')
            ->join('tipos_material','tipos_material.id','=','materiales.id_tipo_material')
            ->get();
            
        return view('Asistencia.entregaDeMaterialAmbienteView', compact('t'));
    }

    public function materialesAmbienteGuardar()
    {
        $datos = request()->except('_token', 'guardar');
        
        $aux = DB::table('materiales')
            ->select('cantidad')
            ->where('id','=',$datos['id'])
            ->get();
        
        DB::table('materiales')
            ->where('id',$datos['id'])
            ->update([
                'cantidad' => $aux[0]->cantidad - $datos['cantidad'],
        ]);

        return UsuarioController::materialesAmbiente();
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
