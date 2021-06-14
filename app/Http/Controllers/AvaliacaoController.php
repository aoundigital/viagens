<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Propriedade;
use App\Models\Socio;
use App\Models\Viagem;
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
        $viage = Viagem::find($request->idViagem);
        $propriedade = Propriedade::find($viage->propriedade_id);

        //criar um array de ids dos socios já cadastrados no avaliação
        $ids = [];
        foreach ($viage->avaliacao as $av) {
            $ids[] = $av->socio_id;
        }

        // dd($links);

        return view('dashboard.avaliacaos.criar', [
            'viagem' => $viage,
            'ids' => $ids,
            'nomeProrpiedade' => $propriedade->nome
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

    public function destroy(Request $request)
    {
        if (!$avaliacao = Avaliacao::find($request->id)) {
            $mensage = 'Este avaliacao ja foi excluida ou não existe!';
            return redirect()->route('viagens.index', [
                'm' => $mensage
            ]);
        }
        $avaliacao->delete();
        $mensage = 'Excluido com Sucesso!';
        return redirect()->route('viagens.index', [
            'm' => $mensage
        ]);
    }
}
