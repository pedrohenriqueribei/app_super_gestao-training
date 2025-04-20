<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    //data formatada
    public function getCreatedAtFormatadoAttribute()
    {
        return $this->created_at->format('d/m/Y  H:i');
    }

    //data formatada
    public function getUpdatedAtFormatadoAttribute()
    {
        return $this->updated_at->format('d/m/Y  H:i');
    }
}
