<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Roles;
use App\Equipo;

class ChecarEventos
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rol = Equipo::select('id_rol')->where('id_user',Auth::user()->id)->first();
        if($rol != 8){
            return redirect()->route('admin.index');
        }
        return $next($request);
    }
}
