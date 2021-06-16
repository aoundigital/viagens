<?php

namespace App\Http\Controllers;

use App\Mail\EnvioAvaliacao;
use App\Mail\EnvioLink;
use Illuminate\Http\Request;
use App\Models\Avaliacao;
use App\Models\Propriedade;
use App\Models\Socio;
use App\Models\Viagem;
use Illuminate\Support\Facades\Mail;

class AvaliacaoController extends Controller
{
    public $mensagem;

    public function index()
    {
        $avaliacaos = Avaliacao::with('casa')->all();

        return view('dashboard.avaliacaos.index', [
            'avaliacaos' => $avaliacaos
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

        return view('dashboard.avaliacaos.criar', [
            'viagem' => $viage,
            'ids' => $ids,
            'nomeProrpiedade' => $propriedade->nome
        ]);
    }

    public function store(Request $request)
    {
        $nome = Socio::where('id', $request->socio_id)->first();

        Avaliacao::create(([
            'viagem_id' => $request->viagem_id,
            'socio_id' => $request->socio_id,
            "propriedade_id" => $request->propriedade_id,
            'nome_socio' => $nome->nome
        ]));

        $this->mensagem =  'Avaliação Criada com Sucesso!';
        return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
    }

    public function destroy(Request $request)
    {
        if (!$avaliacao = Avaliacao::find($request->id)) {
            $this->mensagem = 'Este avaliacao ja foi excluida ou não existe!';
            return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
        }
        $avaliacao->delete();
        $this->mensagem = 'Excluido com Sucesso!';
        return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
    }

    //Geral: para as notas e médias das avaliações
    public function geral(Request $request)
    {
        $avaliacao = Avaliacao::with('casa', 'barco')->find($request->id);
        //se a pesquisa não foi respondida ainda
        $propriedade = Propriedade::find($avaliacao->propriedade_id);

        $mediasCasaAcomodacao = ($avaliacao->casa->acomoda_seguranca +
            $avaliacao->casa->acomoda_conforto +
            $avaliacao->casa->acomoda_conservacao +
            $avaliacao->casa->acomoda_conforto +
            $avaliacao->casa->acomoda_higiene) / 5;

        $mediasCasaFuncionarios = ($avaliacao->casa->funcionarios_honesto +
            $avaliacao->casa->funcionarios_proativo +
            $avaliacao->casa->funcionarios_higiene +
            $avaliacao->casa->funcionarios_simpatia +
            $avaliacao->casa->funcionarios_educacao) / 5;

        $mediasCasaEquipamentos = ($avaliacao->casa->equipamento_golf +
            $avaliacao->casa->equipamento_ar +
            $avaliacao->casa->equipamento_quadriciclo +
            $avaliacao->casa->equipamento_moto +
            $avaliacao->casa->equipamento_veiculo) / 5;

        $mediasCasaTi = ($avaliacao->casa->ti_tv + $avaliacao->casa->ti_telefone + $avaliacao->casa->ti_internet) / 3;

        //propriedades com Barcos
        if ($avaliacao->propriedade_id == 3 or $avaliacao->propriedade_id == 4) {
            // $pesquisaBarco = Avaliacao::with('casa', 'barco')->find($request->id);

        $mediasBarcoAcomodacao = (
            $avaliacao->barco->acomoda_seguranca +
            $avaliacao->barco->acomoda_conforto +
            $avaliacao->barco->acomoda_conservacao +
            $avaliacao->barco->acomoda_conforto +
            $avaliacao->barco->acomoda_higiene) / 5;

        $mediasBarcoFuncionarios = (
            $avaliacao->barco->funcionarios_honesto +
            $avaliacao->barco->funcionarios_proativo +
            $avaliacao->barco->funcionarios_higiene +
            $avaliacao->barco->funcionarios_simpatia +
            $avaliacao->barco->funcionarios_educacao) / 5;

        $mediasBarcoEquipamentosAvare = (+
            $avaliacao->barco->equipamento_jet +
            $avaliacao->barco->equipamento_esquimar +
            $avaliacao->barco->equipamento_eagle) / 3;

        $mediasBarcoEquipamentosAngra = (
            $avaliacao->barco->equipamento_papacalu_83 +
            $avaliacao->barco->equipamento_papacalu_41 +
            $avaliacao->barco->equipamento_papacalu_58 +
            $avaliacao->barco->equipamento_jet ) / 4;

            //se a pesquisa não foi respondida ainda
            if ($avaliacao->barco == null) {
                return redirect()->route('viagens.index');
            }

            return view('dashboard.avaliacaos.barco', [
                'pesquisa' => $avaliacao,
                'nomeProrpiedade' => $propriedade->nome,
                'idPropriedade' => $avaliacao->propriedade_id,
                'mediasCasaAcomodacao' => $mediasCasaAcomodacao,
                'mediasCasaFuncionarios' => $mediasCasaFuncionarios,
                'mediasCasaEquipamentos' => $mediasCasaEquipamentos,
                'mediasCasaTi' => $mediasCasaTi,
                'mediasBarcoAcomodacao' => $mediasBarcoAcomodacao,
                'mediasBarcoFuncionarios' => $mediasBarcoFuncionarios,
                'mediasBarcoEquipamentosAvare' => $mediasBarcoEquipamentosAvare,
                'mediasBarcoEquipamentosAngra' => $mediasBarcoEquipamentosAngra
            ]);
        }
        //propriedades sem Barco

        //se a pesquisa não foi respondida ainda
        if ($avaliacao->casa == null) {
            return redirect()->route('viagens.index');
        }

        return view('dashboard.avaliacaos.casa', [
            'pesquisa' => $avaliacao,
            'nomeProrpiedade' => $propriedade->nome,
            'mediasCasaAcomodacao' => $mediasCasaAcomodacao,
            'mediasCasaFuncionarios' => $mediasCasaFuncionarios,
            'mediasCasaEquipamentos' => $mediasCasaEquipamentos,
            'mediasCasaTi' => $mediasCasaTi
        ]);
    }

    //para disparo de emails...
    public function dispararCasa(Request $request)
    {
        $conteudo = $request;
        // dd($conteudo);
        Mail::to("criatacom@gmail.com")->send(new EnvioAvaliacao($conteudo));
        $this->mensagem = "Email enviado!";
        return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
    }
    public function dispararBarco(Request $request)
    {
        $conteudo = $request;
        // dd($conteudo);
        Mail::to("criatacom@gmail.com")->send(new EnvioAvaliacao($conteudo));
        $this->mensagem = "Email enviado!";
        return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
    }
    public function enviarLink(Request $request)
    {
        $socio = Socio::find($request->idSocio);
        $conteudo = $request;
        Mail::to($socio->email)->send(new EnvioLink($conteudo));

        $this->mensagem = "Email enviado!";
        return redirect()->route('viagens.index')->with('mensagem' , $this->mensagem);
    }
}
