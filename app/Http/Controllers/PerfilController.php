<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Perfil;
use App\LikePerfil;
use Auth;
use App\User;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($usuario)
    {
        $usuario_perfil = User::select('name')->where('name',$usuario)->first();
        if(!$usuario_perfil){
            return view('error');
        }
        $argumentos = array();
        $argumentos['usuario_perfil'] = $usuario_perfil;
        return view('perfil',$argumentos);
    }
    public function edit($id){
        
    }
}
