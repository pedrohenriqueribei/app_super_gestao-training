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
        //adicionar coluna quantidade (int)
        Schema::table('pedidos_produtos', function(Blueprint $table){
            $table->integer('quantidade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //remover coluna quantidade
        Schema::table('pedidos_produtos', function(Blueprint $table){
            $table->dropColumn('quantidade');
        });
    }
};
