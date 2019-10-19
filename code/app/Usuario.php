<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nome','email','senha'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'usuario';
    protected $primaryKey = 'id';
}
