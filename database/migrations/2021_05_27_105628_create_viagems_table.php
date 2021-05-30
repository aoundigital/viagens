<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viagems', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade_dias');
            $table->date('data_entrada');
            $table->date('data_saida');
            $table->unsignedBigInteger('propriedade_id');
            $table->foreign('propriedade_id')->references('id')->on('propriedades');
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
        Schema::dropIfExists('viagems');
    }
}
