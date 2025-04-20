<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    //
    use SoftDeletes;
    
    protected $fillable = ['nome'];

    //função de relacionamento de cliente com pedidos
    public function pedidos() {
        return $this->hasMany(Pedido::class);
    }
}
