<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HabboliciousController extends Controller
{
    public function index(){
        return view('index');
    }
    public function noticias(){
        return view('noticias');
    }
    public function blogs(){
        return view('blogs');
    }
    public function loteria(){
        return view('loteria');
    }
    public function catalogo(){
        return view('catalogo');
    }
    public function eventos(){
        return view('eventos');
    }
    public function equipo(){
        return view('equipo');
    }
    public function vacantes(){
        return view('vacantes');
    }
    public function utilidades(){
        return view('utilidades');
    }
}
