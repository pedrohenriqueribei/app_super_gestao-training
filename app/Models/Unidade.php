<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    //
    protected $fillable = ['unidade', 'descricao'];

    //aula 180
    public function produto() {
        return $this->hasOne(Produto::class);
    }
    
}
