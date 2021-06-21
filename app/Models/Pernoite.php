<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pernoite extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_entrada',
        'data_saida',
        'numero_pessoas',
        'viagem_id',
        'socio_id'
    ];

    // 'foreign_key', 'local_key'
    public function socio()
    {
        return $this->hasOne(Socio::class, 'id', 'socio_id');
    }
}
