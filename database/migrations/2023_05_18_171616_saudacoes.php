<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Saudacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Cria tabela de Saudações
        Schema::create('saudacoes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('saudacao', 500);
            $table->string('periodicidade');
            $table->string('cod_estabel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Exclui tabela Saudações
        Schema::dropIfExists('saudacoes');
    }
}
