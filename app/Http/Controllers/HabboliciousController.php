<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Noticias;
use App\Blogs;
use App\Eventos;
use App\LikePerfil;
use Auth;
use App\User;
use App\Roles;
use Carbon\Carbon;
use App\ComentariosNoticias;

class HabboliciousController extends Controller
{
    public function index(){
        Carbon::setLocale('es');
        $placas = file_get_contents("https://api.socialhabbo.com/badges?per_page=24&hotel=es");
        /* Noticias listado */
        $noticias = Noticias::select('users.habbo','users.name','hb_noticias.id','hb_noticias.titulo','hb_noticias.descripcion','hb_noticias.cuerpo','hb_noticias.created_at','hb_noticias.portada')->orderBy('created_at', 'desc')->
        leftJoin('users','hb_noticias.id_user','users.id')
        ->get();
        $blogs = Blogs::orderBy('created_at', 'desc')->take(8)->get();
        $eventos = Eventos::orderBy('created_at', 'desc')->take(1)->get();
        /* Comentarios destacados */
        $comentarios = ComentariosNoticias::select('users.name','users.habbo','hb_perfil.foto','hb_comentarios_noticias.id_user','hb_comentarios_noticias.id_noticias','hb_comentarios_noticias.cuerpo','hb_comentarios_noticias.created_at','hb_noticias.titulo','hb_noticias.portada')
        ->leftJoin('users','hb_comentarios_noticias.id_user','users.id')
        ->leftJoin('hb_perfil','hb_comentarios_noticias.id_user','hb_perfil.id_user')
        ->leftJoin('hb_noticias','hb_comentarios_noticias.id_user','hb_noticias.id_user')
        ->take(3)
        ->orderBy('hb_comentarios_noticias.created_at','DESC')
        ->get();
        $argumentos = array();
        /* Comentarios total */
        foreach($noticias  as $noti){
            $cuentacomentarios = ComentariosNoticias::select('id')->where('id_noticias',$noti->id)->count();
            $noti->cuenta = $cuentacomentarios;
        }
        foreach($noticias  as $noti){
            $cuentacomentarios = ComentariosNoticias::select('id')->where('id_noticias',$noti->id)->count();
        }
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
        }
        $argumentos['noticias'] = $noticias;
        $argumentos['blogs'] = $blogs;
        $argumentos['eventos'] = $eventos;
        $argumentos['comentarios'] = $comentarios;
        return view('index',$argumentos)->with('habbo',json_decode($placas,true));
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
        $equipo = Roles::where('nombre_rango','!=','Habbolicious')->get();
        foreach($equipo as $equipos){
            $datosequipo = User::select('users.name','hb_perfil.foto','users.descripcion')
            ->leftJoin('hb_perfil','users.id','hb_perfil.id_user')
            ->where('users.id_rol',$equipos->id)
            ->get();
            $equipos->datosnombre = $datosequipo;
        }
        $argumentos = array();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
        }
        $argumentos['equipo'] = $equipo;
        return view('equipo',$argumentos);
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
