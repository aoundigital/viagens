<?php

namespace App\Http\Controllers;

use App\Models\Propriedade;
use App\Models\Translado;
use App\Models\Viagem;
use Illuminate\Http\Request;

class TransladoController extends Controller
{
    public $mensagem;

    public function index()
    {
        $translados = Translado::all();

        return view('dashboard.translados.index', [
            'translados' => $translados
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

        return view('dashboard.translados.criar', [
            'viagem' => $viage,
            'idViagem' => $request->idViagem,
            'nomeProrpiedade' => $propriedade->nome
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Translado::create($request->all());

        $this->mensagem =  'Translado Criado com Sucesso!';
        return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
    }

    public function destroy(Request $request)
    {
        if (!$traslado = Translado::find($request->id)) {
            $this->mensagem = 'Este traslado ja foi excluido ou não existe!';
            return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
        }
        $traslado->delete();
        $this->mensagem = 'Excluido com Sucesso!';
        return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
    }
}
