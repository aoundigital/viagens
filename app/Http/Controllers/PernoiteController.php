<?php

namespace App\Http\Controllers;

use App\Models\Pernoite;
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
        return view('dashboard.pernoites.criar', [
            'idViagem' => $request->idViagem
        ]);
    }

    public function store(Request $request)
    {
        Pernoite::create($request->all());

        return redirect()->route('viagens.index');
    }
}
