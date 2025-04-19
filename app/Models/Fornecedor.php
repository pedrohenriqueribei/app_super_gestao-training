<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    
    // determinar o nome da tabela
    protected $table = 'fornecedores';

    protected $fillable = ['nome', 'site', 'uf', 'email'];

    //aula 187
    public function produtos() {
        return $this->hasMany(Produto::class, 'fornecedor_id', 'id');
        //return $this->hasMany(Produto::class); convenções de nomenclatura do Laravel, você pode simplificar:
    }
}
