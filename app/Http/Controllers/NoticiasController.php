<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Noticias;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Equipo;

class NoticiasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        Carbon::setLocale('es');
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $noticias = Noticias::select('users.name','hb_noticias.id','hb_noticias.titulo','hb_noticias.descripcion','hb_noticias.created_at')
        ->leftJoin('users','hb_noticias.id_user','users.id')
        ->get();
        $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['roles'] = $roles;
        $argumentos['noticias'] = $noticias;
        $argumentos['fotousuario'] = $fotousuario;
        return view('admin.noticias.index',$argumentos);  
    }
    public function create(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['roles'] = $roles;
        $argumentos['fotousuario'] = $fotousuario;
        return view('admin.noticias.create',$argumentos);
    }
    public function store(Request $request){
        $usuario = Auth::user()->id;
        $titulo = $request->input('titulo');
        $descripcion = $request->input('descripcion');
        $cuerpo = $request->input('cuerpo');
        $portada = $request->input('portada');
        $noticias = new Noticias();
        $noticias->id_user = $usuario;
        $noticias->titulo = $titulo;
        $noticias->descripcion = $descripcion;
        $noticias->cuerpo = $cuerpo;
        $noticias->portada = $portada;
        if($noticias->save()){
            return redirect()->route('admin.noticias')->with('exito','Noticia guardada');
        }
        return redirect()->route('admin.noticias')->with('error','No se pudo guardar noticia');
    }
    public function edit($id){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $noticias = Noticias::select('id','titulo','descripcion','cuerpo','portada')->where('id',$id)->first();
        $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['roles'] = $roles;
        $argumentos['fotousuario'] = $fotousuario;
        $argumentos['noticias'] = $noticias;
        return view('admin.noticias.edit',$argumentos);
    }
    public function update(Request $request, $id)
    {
        $noticias = Noticias::find($id);
        $titulo = $request->input('titulo');
        $descripcion = $request->input('descripcion');
        $cuerpo = $request->input('cuerpo');
        $portada = $request->input('portada');
        $noticias->titulo = $titulo;
        $noticias->descripcion = $descripcion;
        $noticias->cuerpo = $cuerpo;
        $noticias->portada = $portada;
        if($noticias->save()){
            return redirect()->route('admin.noticias.edit',$id)->with('exito','Noticia guardadas');
        }
        return redirect()->route('admin.noticias.edit',$id)->with('error','No se pudo guardar noticia');
    }
    public function destroy($id)
    {
        $noticias = Noticias::find($id);
        if($noticias->delete()){
            return redirect()->route('admin.noticias')->with('exito','Noticia eliminada');
        }
        return redirect()->route('admin.noticias')->with('exito','Noticia no se pudo eliminar');
    }
    public function portada(Request $request){
        $foto = $request->file('file');
        if($request->hasFile('file')){
            $archivo = $request->file('file');
            $nombre = 'foto' . time() . $archivo->getClientOriginalName();
            $request->file('file')->move(public_path('/img/portada'),$nombre);
        }
        return array(
            'name' => $nombre,
            'original_name' => $archivo->getClientOriginalName()
        );
    }
}
