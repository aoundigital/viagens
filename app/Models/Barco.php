<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barco extends Model
{
    use HasFactory;

    protected $fillable = [
        'acomoda_higiene',
        'acomoda_conforto',
        'acomoda_conservacao',
        'acomoda_alimentacao',
        'acomoda_seguranca',
        'funcionarios_educacao',
        'funcionarios_simpatia',
        'funcionarios_higiene',
        'funcionarios_proativo',
        'funcionarios_honesto',
        'equipamento_papacalu_83',
        'equipamento_papacalu_41',
        'equipamento_papacalu_58',
        'equipamento_jet',
        'equipamento_esquimar',
        'equipamento_eagle',
        'avaliacao_id',
        'ocorrencia_acomodacoes',
        'ocorrencia_funcionarios',
        'ocorrencia_equipamentos',
    ];
}
