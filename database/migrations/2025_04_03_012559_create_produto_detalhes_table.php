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
        //aula 86
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento', 12, 8);
            $table->float('largura', 12, 8);
            $table->float('altura', 12, 8);

            $table->timestamps();

            //constraint
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_detalhes');
    }
};
