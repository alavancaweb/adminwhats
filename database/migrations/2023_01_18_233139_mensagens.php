<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mensagens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Cria tabela de mensagens
        Schema::create('mensagens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('pergunta', 500);
            $table->string('resposta', 500);
            $table->string('status', 500);
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
        //Exclui tabela mensagens
        Schema::dropIfExists('mensagens');
    }
}
