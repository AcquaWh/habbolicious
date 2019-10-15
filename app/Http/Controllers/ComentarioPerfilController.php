<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\LikePerfil;
use Auth;
use App\User;
use App\ComentariosPerfil;
use App\Sweets;
use App\Roles;
use Carbon\Carbon;

class ComentarioPerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request, $id){
        $usuario_perfil = User::where('id',$id)->first();
        $fotousuario = Perfil::where('id_user',$usuario_perfil->id)->first();
        $comentario = new ComentariosPerfil;
        $comentario->id_user = Auth::user()->id;
        $comentario->cuerpo = $request->input('comentario');
        $comentario->id_perfil = $fotousuario->id;
        if($comentario->save()){
            $sweets = Sweets::where('id_user',Auth::user()->id)->first();
            $sweets->cantidad = $sweets->cantidad+30;
            $sweets->save();
            return redirect()->route('perfil',$usuario_perfil->name)->with('exito','Comentario publicado');
        } else {
            return redirect()->route('perfil',$usuario_perfil->name)->with('error','Comentario no se pudo publicar');
        }
    }
    public function destroy($id){
        $comentario = ComentariosPerfil::find($id);
        $usuario_perfil = User::where('id',$comentario->id_perfil)->first();
        if($comentario->delete()){
            return redirect()->route('perfil',$usuario_perfil->name)->with('exito','Comentario borrado correctamente.');
        }
        return redirect()->route('perfil',$usuario_perfil->name)->with('error','No se pudo borrar comentario');
    }
}
