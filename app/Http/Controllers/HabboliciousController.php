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
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $argumentos = array();
            $argumentos['fotousuario'] = $fotousuario;
            return view('index',$argumentos)->with('habbo',json_decode($placas,true));
        }
        return view('index')->with('habbo',json_decode($placas,true));
    }
    public function noticias(){
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $argumentos = array();
            $argumentos['fotousuario'] = $fotousuario;
            return view('noticias',$argumentos);
        }
        return view('noticias');
    }
    public function blogs(){
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $argumentos = array();
            $argumentos['fotousuario'] = $fotousuario;
            return view('blogs',$argumentos);
        }
        return view('blogs');
    }
    public function loteria(){
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $argumentos = array();
            $argumentos['fotousuario'] = $fotousuario;
            return view('loteria',$argumentos);
        }
            return view('loteria');
    }
    public function catalogo(){
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $argumentos = array();
            $argumentos['fotousuario'] = $fotousuario;
            return view('catalogo',$argumentos);
        }
        return view('catalogo');
    }
    public function eventos(){
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $argumentos = array();
            $argumentos['fotousuario'] = $fotousuario;
            return view('eventos',$argumentos);
        }
        return view('eventos');
    }
    public function equipo(){
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $argumentos = array();
            $argumentos['fotousuario'] = $fotousuario;
            return view('equipo',$argumentos);
        }
        return view('equipo');
    }
    public function vacantes(){
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $argumentos = array();
            $argumentos['fotousuario'] = $fotousuario;
            return view('vacantes',$argumentos);
        }
        return view('vacantes');
    }
    public function utilidades(){
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $argumentos = array();
            $argumentos['fotousuario'] = $fotousuario;
            return view('utilidades', $argumentos);
        }
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
