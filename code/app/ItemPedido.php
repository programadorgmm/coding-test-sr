<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $fillable = ['idproduto','idpedido','quantidade'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'itempedido';
    protected $primaryKey = 'id';
}
