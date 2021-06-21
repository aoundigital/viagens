<?php

namespace App\Http\Controllers;

use App\Models\Pernoite;
use App\Models\Propriedade;
use App\Models\Socio;
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

        return view('dashboard.pernoites.criar', [
            'viagem' => $viage,
            'nomeProrpiedade' => $propriedade->nome,
            // 'nomeSócio' =>
        ]);
    }

    public function store(Request $request)
    {
        Pernoite::create($request->all());

        $this->mensagem =  'Pernoite Criada com Sucesso!';
        return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
    }

    public function destroy(Request $request)
    {
        if (!$traslado = Pernoite::find($request->id)) {
            $this->mensagem = 'Esta pernoite ja foi excluida ou não existe!';
            return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
        }
        $traslado->delete();
        $this->mensagem = 'Excluido com Sucesso!';
        return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
    }
}
