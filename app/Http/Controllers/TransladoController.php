<?php

namespace App\Http\Controllers;

use App\Models\Translado;
use App\Models\Viagem;
use Illuminate\Http\Request;

class TransladoController extends Controller
{
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

        //criar um array de ids dos socios já cadastrados no avaliação
        $ids = [];
        foreach ($viage->avaliacao as $av) {
            $ids[] = $av->socio_id;
        }

        return view('dashboard.translados.criar', [
            'viagem' => $viage,
            'idViagem' => $request->idViagem
        ]);
    }

    public function store(Request $request)
    {
        Translado::create($request->all());

        return redirect()->route('viagens.index');
    }

    public function destroy(Request $request)
    {
        if (!$traslado = Translado::find($request->id)) {
            $mensage = 'Este traslado ja foi excluido ou não existe!';
            return redirect()->route('viagens.index', [
                'm' => $mensage
            ]);
        }
        $traslado->delete();
        $mensage = 'Excluido com Sucesso!';
        return redirect()->route('viagens.index', [
            'm' => $mensage
        ]);
    }
}
