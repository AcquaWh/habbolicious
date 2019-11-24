<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\User;
use Auth;
use App\Roles;
use App\Equipo;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $roleslista = Roles::all();
        $usuarios = User::select('users.id','users.name','users.ip')
        ->get();
        foreach($usuarios as $usu){
            $rangos = Equipo::select('hb_equipo.srol as rango')->where('id_user',$usu->id)->get();
            $usu->rango = $rangos;
        }
        $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['roles'] = $roles;
        $argumentos['roleslista'] = $roleslista;
        $argumentos['usuarios'] = $usuarios;
        $argumentos['fotousuario'] = $fotousuario;
        return view('admin.roles.index',$argumentos);
    }
    public function create(){
        $fotousuario = Perfil::where('id_user',Auth::user()->id)->first();
        $roles = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
        $argumentos = array();
        $argumentos['roles'] = $roles;
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
            if($usuario->save()) {
                return redirect()->route('admin.roles')->with('exito','Se hizo el cambio exitosamente');
            }
        }
        if($id_rol){
            $roles = Equipo::where('id_user',$id)->first();
            if(!$roles){
                $equipo = new Equipo();
                $equipo->id_user = $id;
                $equipo->id_rol = $id_rol;
                $equipo->srol = $request->input('descripcion');
                $equipo->orden = $request->input('orden');
                if($equipo->save()){
                    return redirect()->route('admin.roles')->with('exito','Se hizo el cambio exitosamente');
                }
            } else {
                $roles->id_rol = $id_rol;
                $roles->srol = $request->input('descripcion');
                $roles->orden = $request->input('orden');
                if($roles->save()){
                    return redirect()->route('admin.roles')->with('exito','Se hizo el cambio exitosamente');
                }
            }
           
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
    public function secundario(Request $request, $id){
        $id_rol = $request->input('rol');
        $equipo = new Equipo();
        $equipo->id_user = $id;
        $equipo->id_rol = $id_rol;
        $equipo->srol = $request->input('descripcion');
        $equipo->orden = $request->input('orden');
        if($equipo->save()){
            return redirect()->route('admin.roles')->with('exito','Se hizo el cambio exitosamente');
        }
    }
}
