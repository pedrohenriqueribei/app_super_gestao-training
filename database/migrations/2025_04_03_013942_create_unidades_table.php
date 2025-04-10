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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();

            $table->string('unidade', 5);
            $table->string('descricao', 30);

            $table->timestamps();
        });

        //adicionar relacionamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //adicionar relacionamento com a tabela detalhe produtos
        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //remover relacionamentos com a tabela produto detalhes
        Schema::table('produto_detalhes', function(Blueprint $table) {
            //remover primeiro a FK
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); //padrão de nome de foreign key laravel: [tabela]_[coluna]_foreign

            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });
        
        //remover relacionamentos com a tabela produto
        Schema::table('produtos', function(Blueprint $table){
            //remover FK
            $table->dropForeign('produtos_unidade_id_foreign');

            //remover coluna
            $table->dropColumn('unidade_id');
        });


        //remover tabela unidades
        Schema::dropIfExists('unidades');
    }
};
