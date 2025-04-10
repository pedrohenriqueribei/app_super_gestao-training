<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Aula 89
     */
    public function up(): void
    {
        //incluir coluna site na tabela fornecedores
        Schema::table('fornecedores', function(Blueprint $table){
            $table->string('site', 150)->after('nome')->nullable()->default('www');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //excluir coluna site da tabela fornecedores
        Schema::table('fornecedores', function(Blueprint $table){
            $table->dropColumn('site');
        });
    }
};
