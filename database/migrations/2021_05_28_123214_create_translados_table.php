<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translados', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('prefixo');
            $table->string('horario');
            $table->string('nome_socio');
            $table->unsignedBigInteger('viagem_id');
            $table->foreign('viagem_id')->references('id')->on('viagems')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translados');
    }
}
