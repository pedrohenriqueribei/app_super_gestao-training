<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * AULA 184
     */
    public function up(): void
    {
        //criando a coluna em produtos que vai receber a fk de fornecedores
        Schema::table('produtos', function(Blueprint $table){

            //insere um registro de fornecedor para estabelecer o relacionamento - evitar erro
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Padrão',
                'site' => 'paddrao.com.br',
                'uf' => 'SP',
                'email' => 'contato@paddrao.com.br'
            ]);

            //criar a foreing key
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //desfazer na ordem inversa
        Schema::table('produtos', function(Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
};
