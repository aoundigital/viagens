<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Pernoite;
use App\Models\Propriedade;
use App\Models\Viagem;
use Illuminate\Http\Request;

class PernoiteController extends Controller
{
    public $mensagem;

    public function index()
    {
        $pernoites = Pernoite::all();

        return view('dashboard.pernoites.index', [
            'pernoites' => $pernoites
        ]);
    }

    public function create(Request $request)
    {
        $viage = Viagem::find($request->idViagem);
        $propriedade = Propriedade::find($viage->propriedade_id);

        // dd($viage->pernoite);

        $totalPessoas = 0;
        $geralTotal = 0;
        foreach ($viage->pernoite as $per) {
            $totalPessoas += $per->numero_pessoas;
            $geralTotal += ($per->numero_pessoas * $per->dias);
        }

        // dd($totalPessoas, $geralTotal);

        return view('dashboard.pernoites.criar', [
            'viagem' => $viage,
            'nomeProrpiedade' => $propriedade->nome,
            'totalPessoas' => $totalPessoas,
            'geralTotal' => $geralTotal,
        ]);
    }

    public function store(Request $request)
    {
        $dadosRecebidos = $request->all();
        $entrada = new DateTime($dadosRecebidos['data_saida']);
        $saida = new DateTime($dadosRecebidos['data_entrada']);
        $diferenca = $saida->diff($entrada);

        Pernoite::create([
            'numero_pessoas' => $dadosRecebidos['numero_pessoas'],
            'data_entrada' => $dadosRecebidos['data_entrada'],
            'data_saida' => $dadosRecebidos['data_saida'],
            'viagem_id' => $dadosRecebidos['viagem_id'],
            'socio_id' => $dadosRecebidos['socio_id'],
            'dias' => $diferenca->days,
            ]);

        $this->mensagem =  'Pernoite Criada com Sucesso!';
        return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
    }

    public function destroy(Request $request)
    {
        if (!$pernoite = Pernoite::find($request->id)) {
            $this->mensagem = 'Esta pernoite ja foi excluida ou não existe!';
            return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
        }
        $pernoite->delete();
        $this->mensagem = 'Excluido com Sucesso!';
        return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
    }
}
