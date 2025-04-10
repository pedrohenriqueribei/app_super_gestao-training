<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Aula 88
     */
    public function up(): void
    {
        //criar a tabela filiais
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filial', 40);
            $table->timestamps();
        });

        //criar a tabela produto_filiais
        Schema::create('produto_filiais', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda',12, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            //foreign key(contraints)
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        //removendo colunas da tabela produto
        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //adicionar coluna na tabela produto
        Schema::table('produtos', function(Blueprint $table){
            $table->decimal('preco_venda', 12, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        Schema::dropIfExists('produto_filiais');

        Schema::dropIfExists('filiais');
    }
};
