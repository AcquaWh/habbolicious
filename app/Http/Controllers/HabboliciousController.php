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

        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['fotousuario'] = $fotousuario;
        return view('index',$argumentos)->with('habbo',json_decode($placas,true));
    }
    public function noticias(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['fotousuario'] = $fotousuario;
        return view('noticias',$argumentos);
    }
    public function blogs(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['fotousuario'] = $fotousuario;
        return view('blogs',$argumentos);
    }
    public function loteria(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['fotousuario'] = $fotousuario;
        return view('loteria',$argumentos);
    }
    public function catalogo(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['fotousuario'] = $fotousuario;
        return view('catalogo',$argumentos);
    }
    public function eventos(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['fotousuario'] = $fotousuario;
        return view('eventos',$argumentos);
    }
    public function equipo(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['fotousuario'] = $fotousuario;
        return view('equipo',$argumentos);
    }
    public function vacantes(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['fotousuario'] = $fotousuario;
        return view('vacantes',$argumentos);
    }
    public function utilidades(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['fotousuario'] = $fotousuario;
        return view('utilidades', $argumentos);
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
