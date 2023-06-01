<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sextas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Cria tabela sexta
        Schema::create('sextas', function (Blueprint $table) {
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
        //Exclui tabela sexta
        Schema::dropIfExists('sextas');
    }
}
