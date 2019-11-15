<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\User;
use Auth;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['fotousuario'] = $fotousuario;
        return view('admin.roles.index',$argumentos);
    }
}
