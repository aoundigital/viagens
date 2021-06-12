<?php

namespace App\Http\Controllers;

use App\Models\Pernoite;
use App\Models\Viagem;
use Illuminate\Http\Request;

class PernoiteController extends Controller
{
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
        return view('dashboard.pernoites.criar', [
            'viagem' => $viage
        ]);
    }

    public function store(Request $request)
    {
        Pernoite::create($request->all());

        return redirect()->route('viagens.index');
    }

    public function destroy(Request $request)
    {
        if (!$traslado = Pernoite::find($request->id)) {
            $mensage = 'Esta pernoite ja foi excluida ou não existe!';
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
