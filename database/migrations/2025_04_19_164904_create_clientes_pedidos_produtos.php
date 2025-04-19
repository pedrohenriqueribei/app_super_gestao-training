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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->timestamps();
        });

        Schema::create('pedidos_produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('pedido_id');
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //1 forma
        Schema::table('pedidos_produtos', function(Blueprint $table) {
            $table->dropForeign('pedidos_produtos_produto_id_foreign');
            $table->dropForeign('pedidos_produtos_pedido_id_foreign');
        });

        Schema::table('pedidos', function(Blueprint $table){
            $table->dropForeign('pedidos_cliente_id_foreign');
        });

        //2 forma - desabilita funcionalidade de verificar foreign key do banco de dados
        //Schema::disableForeignKeyConstraints();
        
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('pedidos_produtos');

        //habilitar novamente
        //Schema::enableForeignKeyConstraints();
    }
};
