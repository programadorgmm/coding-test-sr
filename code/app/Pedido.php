<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['codigo','datacompra','nomecomprador','status','valorfrete'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'pedido';
    protected $primaryKey = 'id';
}
