<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\LikePerfil;
use Auth;
use App\User;

class HabboliciousController extends Controller
{
    public function index(){
        $placas = file_get_contents("https://api.socialhabbo.com/badges?per_page=24&hotel=es");
        if(Auth::check()){
            $fotousuario = Perfil::select('id_user')->where('id_user','')->get();
        }
        return view('index')->with('habbo',json_decode($placas,true));
    }
    public function noticias(){
        return view('noticias');
    }
    public function blogs(){
        return view('blogs');
    }
    public function loteria(){
        return view('loteria');
    }
    public function catalogo(){
        return view('catalogo');
    }
    public function eventos(){
        return view('eventos');
    }
    public function equipo(){
        return view('equipo');
    }
    public function vacantes(){
        return view('vacantes');
    }
    public function utilidades(){
        return view('utilidades');
    }
    public function validarUsuario($email){
        $correo = User::where('email',$email)->first();
        if($correo){
            return response()->json(['success'=>'El correo ya existe'],200);
        } else {
            return response()->json(['error'=>'El correo no existe'],404);
        }
    }
}
