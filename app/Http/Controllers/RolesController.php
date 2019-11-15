<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\User;
use Auth;
use App\Roles;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $roles = Roles::all();
        $usuarios = User::select('users.id','users.name','users.ip','hb_roles.nombre_rango as rango')
        ->leftJoin('hb_roles','users.id_rol','hb_roles.id')
        ->get();
        $argumentos = array();
        $argumentos['roles'] = $roles;
        $argumentos['usuarios'] = $usuarios;
        $argumentos['fotousuario'] = $fotousuario;
        return view('admin.roles.index',$argumentos);
    }
    public function create(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $argumentos['fotousuario'] = $fotousuario;
        return view('admin.roles.create',$argumentos);
    }
    public function store(Request $request){
        $rol = new Roles();
        $rango = $request->input('rango');
        $rol->nombre_rango = $rango;
        if($rol->save()){
            return redirect()->route('admin.roles')->with('exito','Se agrego correctamente el nuevo rango');
        }
        return redirect()->route('admin.roles')->with('error','No se logro agregar el nuevo rango');
    }
    public function update(Request $request, $id) {
        $usuario = User::find($id);
        $id_rol = $request->input('rol');
        if ($request->input('password') && $request->input('password') != '') {
            $usuario->password = bcrypt($request->input('password'));
        }
        if($id_rol){
            $usuario->id_rol = $id_rol;
        }
        if($usuario->save()) {
            return redirect()->route('admin.roles')->with('exito','Se hizo el cambio exitosamente');
        }
        return redirect()->route('admin.roles')->with('error','No se logro hacer el cambio deseado');
    }
    public function destroy($id)
    {
        $usuario = User::find($id);
        if($usuario->delete()){
            return redirect()->route('admin.roles')->with('exito','Usuario eliminado');
        }
        return redirect()->route('admin.roles')->with('exito','El usuario no se pudo eliminar correctamente');
    }
}
