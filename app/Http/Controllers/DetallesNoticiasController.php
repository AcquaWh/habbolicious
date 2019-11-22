<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Noticias;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Equipo;
use App\ComentariosNoticias;
class DetallesNoticiasController extends Controller
{
    public function show($id){
        Carbon::setLocale('es');
        $placas = file_get_contents("https://api.socialhabbo.com/badges?per_page=24&hotel=es");
        $noticias = Noticias::select('users.name','hb_noticias.id','hb_noticias.titulo','hb_noticias.descripcion','hb_noticias.cuerpo','hb_noticias.portada','hb_noticias.created_at')
        ->leftJoin('users','hb_noticias.id_user','users.id')
        ->where('hb_noticias.id',$id)
        ->first();
        $cuentacomentarios = ComentariosNoticias::select('id')->where('id_noticias',$id)->count();
        $comentarios = ComentariosNoticias::select('users.name','hb_perfil.foto','hb_comentarios_noticias.id_user','hb_comentarios_noticias.cuerpo','hb_comentarios_noticias.created_at')
        ->leftJoin('users','hb_comentarios_noticias.id_user','users.id')
        ->leftJoin('hb_perfil','hb_comentarios_noticias.id_user','hb_perfil.id_user')
        ->where('hb_comentarios_noticias.id_noticias',$id)
        ->get();
        $argumentos = array();
        $argumentos['noticias'] = $noticias;
        $argumentos['comentarios'] = $comentarios;
        $argumentos['cuentacomentarios'] = $cuentacomentarios;
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        return view('web.noticias.show',$argumentos)->with('habbo',json_decode($placas,true));;
    }
}
