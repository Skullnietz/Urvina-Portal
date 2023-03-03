<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'UsuarioCteCorp';
    protected $primaryKey = 'UsuarioCteCorp';
    protected $fillable = [
         'Clave'
    ];
}
