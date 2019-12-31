<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Noticias;
use Auth;
use App\User;
use App\Roles;
use App\Equipo;
use App\VacantesFormulario;
use App\VacantesRegistro;
use Carbon\Carbon;

class VacantesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $formulario = VacantesFormulario::select('id','titulo','cuerpo','pregunta1','pregunta2','pregunta3','pregunta4')->orderBy('id','DESC')->get();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        $argumentos = array();
        $argumentos['formulario'] = $formulario;
        return view('admin.vacantes.index',$argumentos);
    }
    public function create()
    {
        $argumentos = array();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        return view('admin.vacantes.create',$argumentos);
    }
    public function store(Request $request)
    {
        $formulario = new VacantesFormulario();
        $formulario->titulo = $request->input('titulo');
        $formulario->cuerpo = $request->input('cuerpo');
        $formulario->pregunta1 = $request->input('pregunta1');
        $formulario->pregunta2 = $request->input('pregunta2');
        $formulario->pregunta3 = $request->input('pregunta3');
        $formulario->pregunta4 = $request->input('pregunta4');
        if($formulario->save()){
            return redirect()->route('admin.vacantes')->with('exito','Vacante creada correctamente');
        }
        return redirect()->route('admin.vacantes')->with('error','No se pudo crear vacante');
    }
    public function edit($id)
    {
        $formulario = VacantesFormulario::find($id);
        $argumentos = array();
        if(Auth::check()){
            $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
            $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
            $argumentos['fotousuario'] = $fotousuario;
            $argumentos['roles'] = $roles;
        }
        $argumentos['formulario'] = $formulario;
        return view('admin.vacantes.edit',$argumentos);
    }
    public function update(Request $request, $id)
    {
        $formulario = VacantesFormulario::find($id);
        $formulario->titulo = $request->input('titulo');
        $formulario->cuerpo = $request->input('cuerpo');
        $formulario->pregunta1 = $request->input('pregunta1');
        $formulario->pregunta2 = $request->input('pregunta2');
        $formulario->pregunta3 = $request->input('pregunta3');
        $formulario->pregunta4 = $request->input('pregunta4');
        if($formulario->save()){
            return redirect()->route('admin.vacantes.edit',$id)->with('exito','Vacante guardada');
        }
        return redirect()->route('admin.vacantes.edit',$id)->with('error','No se pudo guardar vacante');
    }
    public function destroy($id)
    {
        $formulario = VacantesFormulario::find($id);
        if($formulario->delete()){
            return redirect()->route('admin.vacantes')->with('exito','Vacante eliminado');
        }
        return redirect()->route('admin.vacantes')->with('exito','El vacante no se pudo eliminar');
    }
}