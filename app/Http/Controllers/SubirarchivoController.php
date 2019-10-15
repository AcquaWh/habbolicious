<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use Auth;
use App\User;

class SubirarchivoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
    public function avatar(Request $request){
        $foto = $request->file('file');
        if($request->hasFile('file')){
            $archivo = $request->file('file');
            $nombre = 'foto' . time() . $archivo->getClientOriginalName();
            $request->file('file')->move(public_path('/img/avatar'),$nombre);
        }
        return array(
            'name' => $nombre,
            'original_name' => $archivo->getClientOriginalName()
        );
    }
}
