<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['fotousuario'] = $fotousuario;
        return view('admin.index',$argumentos);
    }
}
