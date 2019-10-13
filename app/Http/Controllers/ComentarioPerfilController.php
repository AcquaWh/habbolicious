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
        $comentario->id_user = $usuario_perfil->id;
        $comentario->cuerpo = $request->input('comentario');
        $comentario->id_perfil = $fotousuario->id;
        if($comentario->save()){
            return redirect()->route('perfil',$usuario_perfil->name)->with('exito','Comentario publicado');
        } else {
            return redirect()->route('perfil',$usuario_perfil->name)->with('error','Comentario no se pudo publicar');
        }
    }
}
