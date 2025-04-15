<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    // determinar o nome da tabela
    protected $table = 'fornecedores';

    protected $fillable = ['nome', 'site', 'uf', 'email'];

    
}
