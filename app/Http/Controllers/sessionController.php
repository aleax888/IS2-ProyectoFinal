<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Rol;
use App\Models\Usuario;

//use SimpleSoftwareIO\QrCode\Facade\QrCode;
use QrCode;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\UsuarioController;

class sessionController extends Controller
{
    public function loginValidate(){
        $datos = request()->except('_token', 'guardar');
        $t = DB::table('usuarios')
            ->select('email', 'password', 'id', 'id_rol', 'QR', 'nombre', 'apellido')
            ->where('email','=',$datos['email'])
            ->where('password','=',$datos['password'])
            ->get();
        $aux = DB::table('usuarios')->where('email','=',$datos['email'])->value('id_rol');  
        if ($t->count() == 1)
        {
            if ($aux == 1)
                return view('Perfiles.participantePerfilView', compact('t'));
            if ($aux == 2)
                return view('Perfiles.colaboradorPerfilView', compact('t'));
            if ($aux == 3)
                return view('Perfiles.administradorPerfilView', compact('t'));
            if ($aux == 4)
                return view('Perfiles.encargadoPerfilView', compact('t'));
        }
        else
            return "perfil invalido ¯\_(ツ)_/¯";
    }

    public function perfil($id){
        $t = DB::table('usuarios')
            ->select('email', 'password', 'id', 'id_rol', 'QR', 'nombre', 'apellido')
            ->where('id','=',$id)
            ->get();
        $aux = DB::table('usuarios')->where('email','=',$datos['email'])->value('id_rol');  
        if ($t->count() == 1)
        {
            if ($aux == 1)
                return view('Perfiles.participantePerfilView', compact('t'));
            if ($aux == 2)
                return view('Perfiles.colaboradorPerfilView', compact('t'));
            if ($aux == 3)
                return view('Perfiles.administradorPerfilView', compact('t'));
            if ($aux == 4)
                return view('Perfiles.encargadoPerfilView', compact('t'));
        }
        else
            return "perfil invalido ¯\_(ツ)_/¯";
    }

    public function register(){

        //return QrCode::generate('Codigo QR de Fulano');

        $datos = request()->except('_token', 'submit');
        
        $t = DB::table('usuarios')
            ->select('email')
            ->where('email','=', $datos['correo'])
            ->get();
        if ($t->count() == 1)
            return "correo invalido ¯\_(ツ)_/¯";
        
        DB::table('usuarios')->insert([
            'QR' => 'QR_text',
            'nombre' => request()->input('nombres'),
            'apellido' => request()->input('apellidos'),
            'email' => request()->input('correo'),
            'password' => request()->input('password'),
            'id_rol' => '1',
        ]);
        
        return view('Sesion.registerView');
        
    }

    public function destroy(){
        auth()->logot();

        return redirect()->to('/');
    }
    
}
