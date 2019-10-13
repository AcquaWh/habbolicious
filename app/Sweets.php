<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Sweets extends Authenticatable 
{
    protected $fillable = [
        'id_user','cantidad'
    ];
    protected $table = "hb_sweets";
}
