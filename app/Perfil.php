<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Perfil extends Authenticatable 
{
    protected $fillable = [
        'id_user'
    ];
    protected $table = "hb_perfil";
}
