<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Perfil;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Equipo;
use App\Eventos;

class EventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        Carbon::setLocale('es');
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $eventos = Eventos::select('users.name','hb_eventos.id','hb_eventos.titulo','hb_eventos.descripcion','hb_eventos.fecha','hb_eventos.created_at')
        ->leftJoin('users','hb_eventos.id_user','users.id')
        ->get();
        $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['roles'] = $roles;
        $argumentos['eventos'] = $eventos;
        $argumentos['fotousuario'] = $fotousuario;
        return view('admin.eventos.index',$argumentos);
    }
    public function create(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['roles'] = $roles;
        $argumentos['fotousuario'] = $fotousuario;
        return view('admin.eventos.create',$argumentos);
    }
    public function store(Request $request){
        $usuario = Auth::user()->id;
        $eventos = new Eventos();
        $eventos->id_user = $usuario;
        $eventos->titulo = $request->input('titulo');
        $eventos->descripcion = $request->input('descripcion');
        $eventos->cuerpo = $request->input('cuerpo');
        $eventos->portada = $request->input('portada');
        $eventos->fecha = $request->input('fecha');
        if($eventos->save()){
            return redirect()->route('admin.eventos')->with('exito','Evento guardado');
        }
        return redirect()->route('admin.eventos')->with('error','No se pudo guardar el evento');
    }
    public function edit($id){
        
    }
    public function update(Request $request, $id){

    }
    public function destroy($id){
        $eventos = Eventos::find($id);
        File::delete(public_path()."/img/portada/".$eventos->portada);
        if($eventos->delete()){
            return redirect()->route('admin.eventos')->with('exito','Evento eliminado correctamente');
        }
        return redirect()->route('admin.eventos')->with('exito','El evento no se pudo eliminar');
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
