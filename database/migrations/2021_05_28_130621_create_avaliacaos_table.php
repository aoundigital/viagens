<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateAvaliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('viagem_id');//chave estrangeira
            $table->string('nome_socio')->nullable();
            $table->foreign('viagem_id')->references('id')->on('viagems')->onDelete('cascade');
            $table->unsignedBigInteger('socio_id');//chave estrangeira
            $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade');
            $table->unsignedBigInteger('propriedade_id');//chave estrangeira
            $table->foreign('propriedade_id')->references('id')->on('propriedades')->onDelete('cascade');
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
        Schema::dropIfExists('avaliacaos');
    }
}
