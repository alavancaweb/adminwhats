<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ausencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Cria tabela de Ausencias
        Schema::create('ausencias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ausencia', 500);
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
        //Exclui tabela ausencias
        Schema::dropIfExists('ausencias');
    }
}
