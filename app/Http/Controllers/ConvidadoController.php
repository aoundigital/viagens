<?php

namespace App\Http\Controllers;

use App\Models\Convidado;
use Illuminate\Http\Request;

class ConvidadoController extends Controller
{
    public function index()
    {
        $convidados = Convidado::all();

        return view('dashboard.convidados.index', [
            'convidados' => $convidados
        ]);
    }

    public function create(Request $request)
    {
        return view('dashboard.convidados.criar', [
            'idPernoite' => $request->idPernoite
        ]);
    }

    public function store(Request $request)
    {
        Convidado::create($request->all());

        return redirect()->route('viagens.index');
    }
}
