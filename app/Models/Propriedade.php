<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Viagem;
use App\Models\Avaliacao;

class Propriedade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    public function viagem()
    {
        return $this->hasMany(Viagem::class, 'propriedade_id', 'id' );
    }

    public function avaliacao()
    {
        return $this->hasMany(Avaliacao::class, 'propriedade_id', 'id' );
    }


}
