<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Aula 130
     */
    public function up(): void
    {
        //adicionando motivo contatos id
        Schema::table('site_contatos', function(Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //atribuindo motivo_contato para a nova columa motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //crirar a constraint FK
        Schema::table('site_contatos', function(Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');

            //remover a coluna motivo_contato
            $table->dropColumn('motivo_contato');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //remover a coluna 
        Schema::table('site_contatos', function(Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        //atribuindo motivo_contatos_id para a nova columa motivo_contatos
        DB::statement('update site_contatos set motivo_contatos = motivo_contatos_id');

        //remover coluna
        Schema::table('site_contatos', function(Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
};
