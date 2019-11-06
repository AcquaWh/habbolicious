<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Noticias;
use Auth;
use App\User;
use Carbon\Carbon;

class DetallesNoticiasController extends Controller
{
    public function show($id){
        Carbon::setLocale('es');
        $placas = file_get_contents("https://api.socialhabbo.com/badges?per_page=24&hotel=es");
        $noticias = Noticias::select('users.name','hb_noticias.id','hb_noticias.titulo','hb_noticias.descripcion','hb_noticias.cuerpo','hb_noticias.portada','hb_noticias.created_at')
        ->leftJoin('users','hb_noticias.id_user','users.id')
        ->where('hb_noticias.id',$id)
        ->first();
        $argumentos = array();
        $argumentos['noticias'] = $noticias;
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
        }
        return view('web.noticias.show',$argumentos)->with('habbo',json_decode($placas,true));;
    }
}
