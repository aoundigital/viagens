<?php

namespace App\Http\Controllers;

use App\Models\Propriedade;
use App\Models\Reembolso;
use App\Models\Socio;
use App\Models\Viagem;
use Illuminate\Http\Request;

class ReembolsoController extends Controller
{
    public $mensagem;

    public function index()
    {
        $reembolsos = Reembolso::all();

        return view('dashboard.reembolsos.index', [
            'reembolsos' => $reembolsos
        ]);
    }

    public function create(Request $request)
    {
        $viage = Viagem::with('reembolso')->find($request->idViagem);
        $propriedade = Propriedade::find($viage->propriedade_id);

        //criar um array de ids dos socios já cadastrados no reembolso
        $ids = [];
        foreach ($viage->reembolso as $re) {
            $ids[] = $re->socio_id;
        }

        return view('dashboard.reembolsos.criar', [
            'viagem' => $viage,
            'ids' => $ids,
            'nomeProrpiedade' => $propriedade->nome
        ]);
    }

    public function store(Request $request)
    {
       $nome = Socio::where('id', $request->socio_id )->first();

       if (!$nome->nome) {
          return redirect()->back();
       }
        Reembolso::create([
            'viagem_id' => $request->viagem_id,
            'socio_id' => $request->socio_id,
            'nome_socio' => $nome->nome
        ]);

        $this->mensagem =  'Reembolso Criado com Sucesso!';
        return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
    }

    public function destroy(Request $request)
    {
        if (!$reembolso = Reembolso::find($request->id)) {
            $this->mensagem =  'Este reembolso ja foi excluida ou não existe!';
            return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
        }
        $reembolso->delete();
        $this->mensagem =  'Excluido com Sucesso!';
        return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
    }
}
