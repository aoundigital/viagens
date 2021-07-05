<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePernoitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pernoites', function (Blueprint $table) {
            $table->id();
            $table->date('data_entrada');
            $table->date('data_saida');
            $table->integer('dias');
            $table->integer('numero_pessoas');
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
        Schema::dropIfExists('pernoites');
    }
}
