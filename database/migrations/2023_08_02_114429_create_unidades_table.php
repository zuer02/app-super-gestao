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

        // add o rel com a produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // add o rel com a produto_detalhes
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
        // remover rel com a produto_detalhe
        Schema::table('produto_detalhes', function(Blueprint $table){
            //remove fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            //remove a couluna
            $table->dropColumn('unidade_id'); 
        });

        // remover rel com a produtos
        Schema::table('produtos', function(Blueprint $table){
            //remove fk
            $table->dropForeign('produtos_unidade_id_foreign');
            //remove a couluna
            $table->dropColumn('unidade_id'); 
        });

        Schema::dropIfExists('unidades');
    }
};
