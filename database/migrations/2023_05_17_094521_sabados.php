<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sabados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Cria tabela sabado
        Schema::create('sabados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('inicio');
            $table->string('pausa');
            $table->string('retorno');
            $table->string('fim');
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
         //Exclui tabela sabados
         Schema::dropIfExists('sabados');
    }
}
