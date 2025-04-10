<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //adicionar colunas na tabela de fornecedores
        //aula 83
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('cnpj', 20)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('email', 255);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //para remover colunas
        Schema::table('fornecedores', function(Blueprint $table){
            //$table->dropColumn('uf');
            $table->dropColumn(['uf', 'email','cnpj','cidade']);
        });
    }
};
