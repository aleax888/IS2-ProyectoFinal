<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rol;
use App\Models\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class sessionController extends Controller
{
    public function loginValidate(){
        
        if (auth()->attempt(request(['email', 'password'])) == false){
            return request(['email', 'password']);
        }
        return "calla kchera";
        //redirect()->to('/');
    }

    public function destroy(){
        auth()->logot();

        return redirect()->to('/');
    }
    
}
