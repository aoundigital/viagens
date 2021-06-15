<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'viagem_id',
        'socio_id',
        'nome_socio',
        'propriedade_id'
    ];

    // 'foreign_key', 'local_key'
    public function casa()
    {
        return $this->hasOne(Casa::class, 'avaliacao_id', 'id');
    }

    public function barco()
    {
        return $this->hasOne(Barco::class, 'avaliacao_id', 'id');
    }
}
