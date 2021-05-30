<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reembolso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_socio',
        'viagem_id',
        'socio_id'
    ];
}
