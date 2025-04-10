<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //criação de registros no banco de dados
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'www.fornecedor100.com.br';
        $fornecedor->uf   = 'DF';
        $fornecedor->email = 'atendimento@forn100.com.br' ;
        
        $fornecedor->save();

        //metodo create
        Fornecedor::create(['nome' => 'Fornecedor ABC', 
            'site' => 'www.fornecedorABC.com.br', 
            'uf' => 'GO', 
            'email' => 'atendimento@fornecedorabc.com.br'
        ]);

        Fornecedor::create([
            'nome' => 'Fornecedor 256', 
            'site' => 'www.fornecedor256.com.br', 
            'uf' => 'MG', 
            'email' => 'atendimento@fornecedor256.com.br'
        ]);

        //3ª forma
        //insert
        /*
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 256', 
            'site' => 'www.fornecedor256.com.br', 
            'uf' => 'MG', 
            'email' => 'atendimento@fornecedor256.com.br'        
        ]);
        */
    }
}
