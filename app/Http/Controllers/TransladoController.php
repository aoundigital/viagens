<?php

namespace App\Http\Controllers;

use App\Models\Translado;
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
        return view('dashboard.translados.criar', [
            'idViagem' => $request->idViagem
        ]);
    }

    public function store(Request $request)
    {
        Translado::create($request->all());

        return redirect()->route('viagens.index');
    }
}
