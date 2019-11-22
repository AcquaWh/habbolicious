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
use App\Equipo;
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
        ->take(6)->get();
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
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        $argumentos['noticias'] = $noticias;
        $argumentos['blogs'] = $blogs;
        $argumentos['eventos'] = $eventos;
        $argumentos['comentarios'] = $comentarios;
        return view('index',$argumentos)->with('habbo',json_decode($placas,true));
    }
    public function noticias(){
        $argumentos = array();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        return view('noticias',$argumentos);
    }
    public function blogs(){
        $argumentos = array();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        return view('blogs',$argumentos);
    }
    public function loteria(){
        $argumentos = array();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
            return view('loteria',$argumentos);
    }
    public function catalogo(){
        $argumentos = array();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        return view('catalogo',$argumentos);
    }
    public function eventos(){
        $argumentos = array();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        return view('eventos',$argumentos);
    }
    public function equipo(){
        $equipo = Roles::where('nombre_rango','!=','Habbolicious')->get();
        foreach($equipo as $equipos){
            $datosequipo = Equipo::select('users.name','hb_perfil.foto','users.habbo','hb_equipo.srol','hb_equipo.orden')
            ->leftJoin('users','hb_equipo.id_user','users.id')
            ->leftJoin('hb_perfil','users.id','hb_perfil.id_user')
            ->where('hb_equipo.id_rol',$equipos->id)
            ->orderBy('hb_equipo.orden','ASC')
            ->get();
            $equipos->datosnombre = $datosequipo;
        }
        $argumentos = array();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        $argumentos['equipo'] = $equipo;
        return view('equipo',$argumentos);
    }
    public function vacantes(){
        $argumentos = array();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        return view('vacantes',$argumentos);
    }
    public function utilidades(){
        $argumentos = array();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        return view('utilidades',$argumentos);
    }
    public function normas(){
        $argumentos = array();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        return view('normas',$argumentos);
    }
    public function terminos(){
        $argumentos = array();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        return view('terminos',$argumentos);
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
