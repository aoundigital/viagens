<?php

namespace App\Http\Controllers;

use App\Models\Propriedade;
use Illuminate\Http\Request;

class PropriedadeController extends Controller
{
    public function index()
    {
        $propriedades = Propriedade::with(['viagem', 'avaliacao'])->get();

        return view('dashboard.propriedades.index', [
            'propriedades' => $propriedades
            ]);
    }
}
