<?php

namespace App\Http\Controllers;

use App\Models\Emails;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    public function index()
    {
        $emails = Emails::all();
        return view('emails.index', [
            'emails' => $emails
        ]);
    }

    public function store(Request $request)
    {
        Emails::create($request->all());

        $this->mensagem =  'Email Criado com Sucesso!';
        return redirect()->route('emails.index')->with('mensagem' , $this->mensagem);
    }

    public function destroy(Request $request)
    {
        if (!$email = Emails::find($request->id)) {
            $this->mensagem = 'Este email ja foi excluida ou não existe!';
            return redirect()->route('emails.index')->with('mensagem' , $this->mensagem);
        }
        $email->delete();
        $this->mensagem = 'Email Excluido com Sucesso!';
        return redirect()->route('emails.index')->with('mensagem' , $this->mensagem);
    }
}
