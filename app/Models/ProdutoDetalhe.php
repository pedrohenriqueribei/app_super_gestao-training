<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    //
    protected $fillable = ['produto_id', 'comprimento', 'altura', 'largura', 'unidade_id'];

    //aula 180 - detalhe pertence a produto
    public function produto() {
        return $this->belongsTo('App\Models\Produto');
    }

    public function unidade() {
        return $this->belongsTo('App\Models\Unidade');
    }
}
