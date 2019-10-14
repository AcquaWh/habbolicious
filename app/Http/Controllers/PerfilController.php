<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Perfil;
use App\LikePerfil;
use Auth;
use App\User;
use App\ComentariosNoticias;
use App\ComentariosPerfil;
use App\Sweets;
use App\Roles;
use Carbon\Carbon;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($usuario)
    {
        Carbon::setLocale('es');
        $usuario_perfil = User::where('name',$usuario)->first();
        if(!$usuario_perfil){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $argumentos = array();
            $argumentos['fotousuario'] = $fotousuario;
            return view('error',$argumentos);
        } else {
            $fotousuario = Perfil::where('id_user',$usuario_perfil->id)->first();
            $sweets = Sweets::where('id_user',$usuario_perfil->id)->first();
            $roles = Roles::find($usuario_perfil->id);
            $likes = LikePerfil::where('id_perfil',$fotousuario->id)->count();
            $comentarios = ComentariosNoticias::select('id')->where('id_user',$usuario_perfil->id)->count();
            $comentariosperfil = ComentariosPerfil::select('users.name','hb_comentarios_perfil.cuerpo','hb_comentarios_perfil.created_at','hb_perfil.foto')
            ->leftJoin('users','hb_comentarios_perfil.id_user','users.id')
            ->leftJoin('hb_perfil','users.id','hb_perfil.id_user')
            ->where('id_perfil',$fotousuario->id)
            ->get();
            $argumentos = array();
            $argumentos['usuario_perfil'] = $usuario_perfil;
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['sweets'] = $sweets;
            $argumentos['roles'] = $roles;
            $argumentos['comentarios'] = $comentarios;
            $argumentos['comentariosperfil'] = $comentariosperfil;
            $argumentos['likes'] = $likes;
            return view('perfil',$argumentos);
        }
    }
    public function edit($id){
        $usuario_perfil = User::find($id);
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['fotousuario'] = $fotousuario;
        $argumentos['usuario_perfil'] = $usuario_perfil;
        return view('perfileditar',$argumentos);
    }
    public function update(Request $request, $id) {
        $usuario = User::find($id);
        $perfil = Perfil::where('id_user',$usuario->id)->first();
        if ($request->input('contra') && $request->input('contra') != '') {
            $usuario->password = bcrypt($request->input('contra'));
        }
        $usuario->name = $request->input('nombre');
        $usuario->habbo = $request->input('habbo');
        $perfil->cumple = $request->input('cumple');
        $perfil->twitter = $request->input('twitter');
        $perfil->video_youtube = $request->input('youtube');
        $perfil->portada = $request->input('portada');
        $perfil->foto = $request->input('fotos');
        if($usuario->save()){
            if($perfil->save()){
                return redirect()->route('perfil.edit',$id)->with('exito','Perfil actualizado');
            }
        }
        return redirect()->route('perfil.edit',$id)->with('error','Perfil no actualizado');
    }
    public function contadorlikes($id){
        $like = LikePerfil::select('id')->where('id_perfil',$id)->count();
        return response()->json(['contador'=>$like],200);
    }
    public function likeperfil(Request $request, $id){
        $likead = LikePerfil::select('id')->where('id_user',Auth::user()->id)->count();
        if($likead == 0){
            $like = new LikePerfil;
            $like->id_user = Auth::user()->id;
            $like->id_perfil = $id;
            if($like->save()){
                return response()->json(['success'=>'Se guardo'],200);
            }
        }
    }
}
