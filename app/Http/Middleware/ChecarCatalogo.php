<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Roles;
use App\Equipo;

class ChecarCatalogo
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
        if($rol->id_rol != 12){
            return $next($request);
        }
        return $next($request);
    }
}
