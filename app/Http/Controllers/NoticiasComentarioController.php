<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Noticias;
use Auth;
use App\User;
use App\Sweets;
use Carbon\Carbon;
use App\ComentariosNoticias;

class NoticiasComentarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request,$id){
        $usuario = Auth::user()->id;
        $comentarios = new ComentariosNoticias();
        $comentarios->id_user = $usuario;
        $comentarios->id_noticias = $id;
        $comentarios->cuerpo = $request->input('comentario');
        if($comentarios->save()){
            $sweets = Sweets::where('id_user',$usuario)->first();
            $sweets->cantidad = $sweets->cantidad+30;
            $sweets->save();
            return redirect()->route('noticias.show',$id)->with('exito','Se agrego comentario');
        }
        return redirect()->route('noticias.show',$id)->with('error','No se pudo guardar comentario');
    }
}
