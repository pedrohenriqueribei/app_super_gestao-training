<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //muitos produtos pertencem a um determinado pedido
    public function produtos() {
        //mapeamento padrão Laravel
        return $this->belongsToMany(Produto::class, 'pedidos_produtos')->withPivot("id","created_at", "updated_at", "quantidade");

        /**
         * Caso não seja o mapeamento padrão, tem que passar 4 parâmetros na função belongsToMany
         * 1 - nome da classe que mapeia (Item::class)
         * 2 - o nome da tabela auxiliar de mapeamento (pedidos_produtos)
         * 3 - o nome do campo que referencia a tabela principal na tabela auxiliar (pedido_id)
         * 4 - o nome do campo que referencia a tabela secundária na tabela auxiliar (produto_id)
         * 
         * Ficaria assim:
         * return $this->belongsToMany(ItemPedido::class, 'pedidos_produtos', 'pedido_id', 'produto_id');
         */
    }
    //um cliente pertence a um pedido
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

    //data formatado do pivot
    public function getDataCriacaoPivotFormatado() {
        // Verifica se a relação pivot está carregada e tem o campo created_at
        if ($this->pivot && $this->pivot->created_at) {
            return Carbon::parse($this->pivot->created_at)->format('d/m/Y');
        }
        return null;
    }
}
