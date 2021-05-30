<?php

namespace App\Http\Controllers;

use App\Models\Reembolso;
use App\Models\Socio;
use Illuminate\Http\Request;

class ReembolsoController extends Controller
{
    public function index()
    {
        $reembolsos = Reembolso::all();

        return view('dashboard.reembolsos.index', [
            'reembolsos' => $reembolsos
        ]);
    }

    public function create(Request $request)
    {
        return view('dashboard.reembolsos.criar', [
            'idViagem' => $request->idViagem
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

        return redirect()->route('viagens.index');
    }
}
