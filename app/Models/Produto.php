<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    //
    //use SoftDeletes;

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    //aula 179
    public function produtoDetalhe() {
        return $this->hasOne(ProdutoDetalhe::class);
    }

    //aula 180
    public function unidade() {
        return $this->belongsTo (Unidade::class);
    }

    //aula 185
    public function fornecedor() {
        return $this->belongsTo(Fornecedor::class);
    }

    //aula 187 - formatar a exibição das informações de produtos
    public function formatarNomeComId(): string {
        return "{$this->id} - {$this->nome}";
    }

    //data formatada
    public function getCreatedAtFormatado()
    {
        return $this->created_at->format('d/m/Y  H:i');
    }

    //aula 197 - relacionamento de produto com pedidos
    public function pedidos() {
        return $this->belongsToMany(Pedido::class, 'pedidos_produtos');
    }
    
}
