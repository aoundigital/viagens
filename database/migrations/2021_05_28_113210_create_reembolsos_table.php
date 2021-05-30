<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReembolsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reembolsos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_socio');
            $table->unsignedBigInteger('viagem_id');//chave estrangeira
            $table->foreign('viagem_id')->references('id')->on('viagems')->onDelete('cascade');
            $table->unsignedBigInteger('socio_id');//chave estrangeira
            $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade');
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
        Schema::dropIfExists('reembolsos');
    }
}
