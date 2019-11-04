<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Noticias;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $usuarios = User::select('id')->count();
        $noticias = Noticias::select('id')->count();
        $usuariosdj = User::select('id')->where('id_rol',5)->count();
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['fotousuario'] = $fotousuario;
        $argumentos['usuarios'] = $usuarios;
        $argumentos['noticias'] = $noticias;
        $argumentos['usuariosdj'] = $usuariosdj;
        return view('admin.index',$argumentos);
    }
}
