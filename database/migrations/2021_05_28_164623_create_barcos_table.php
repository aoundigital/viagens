<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barcos', function (Blueprint $table) {
            $table->id();
            $table->integer('acomoda_higiene');
            $table->integer('acomoda_conforto');
            $table->integer('acomoda_conservacao');
            $table->integer('acomoda_alimentacao');
            $table->integer('acomoda_seguranca');
            $table->integer('funcionarios_educacao');
            $table->integer('funcionarios_simpatia');
            $table->integer('funcionarios_higiene');
            $table->integer('funcionarios_proativo');
            $table->integer('funcionarios_honesto');
            $table->integer('equipamento_papacalu_83');
            $table->integer('equipamento_papacalu_41');
            $table->integer('equipamento_papacalu_58');
            $table->integer('equipamento_jet');
            $table->integer('equipamento_esquimar');
            $table->integer('equipamento_eagle');
            $table->unsignedBigInteger('avaliacao_id');//chave estrangeira
            $table->foreign('avaliacao_id')->references('id')->on('avaliacaos')->onDelete('cascade');
            $table->string('ocorrencia_acomodacoes');
            $table->string('ocorrencia_funcionarios');
            $table->string('ocorrencia_equipamentos');
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
        Schema::dropIfExists('barcos');
    }
}
