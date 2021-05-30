<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Socio;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function index()
    {
        $avaliacaos = Avaliacao::all();

        return view('dashboard.avaliacaos.index', [
            'avaliacaos' => $avaliacaos
        ]);
    }

    public function create(Request $request)
    {
        return view('dashboard.avaliacaos.criar', [
            'idViagem' => $request->idViagem,
            'idPropriedade' => $request->idPropriedade
        ]);
    }

    public function store(Request $request)
    {
        $nome = Socio::where('id', $request->socio_id )->first();

        Avaliacao::create(([
            'viagem_id' => $request->viagem_id,
            'socio_id' => $request->socio_id,
            "propriedade_id" => $request->propriedade_id,
            'nome_socio' => $nome->nome
        ]));

        return redirect()->route('viagens.index');
    }
}
