<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateViagens;
use App\Models\Viagem;
use Illuminate\Http\Request;

class ViagemController extends Controller
{
    public function index()
    {
        $viagens = Viagem::with([
            'propriedade',
            'reembolso',
            'pernoite',
            'translado',
            'avaliacao'
        ])->latest()->paginate(6);

        // dd($viagens);

        return view('dashboard.viagens.index_novo', [
            'viagens' => $viagens
        ]);
    }

    public function create()
    {
        return view('dashboard.viagens.criar');
    }

    public function store(StoreUpdateViagens $request)
    {
        Viagem::create($request->all());

        return redirect()->route('viagens.index');
    }

    public function destroy(Request $request)
    {
        // dd($request->id);
        if (!$viage = Viagem::find($request->id)) {
            $mensage = 'Esta viagem ja foi excluida ou não existe!';
            return redirect()->route('viagens.index', [
                'm' => $mensage
            ]);
        }
        //deleta a viagem e retorna com mensagem
        $viage->delete();
        $mensage = 'Excluido com Sucesso!';
        return redirect()->route('viagens.index', [
            'm' => $mensage
        ]);
    }
}
