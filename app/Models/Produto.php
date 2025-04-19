<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    //
    //use SoftDeletes;

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    //aula 179
    public function produtoDetalhe() {
        return $this->hasOne(ProdutoDetalhe::class);
    }

    //aula 180
    public function unidade() {
        return $this->belongsTo (Unidade::class);
    }
    
}
