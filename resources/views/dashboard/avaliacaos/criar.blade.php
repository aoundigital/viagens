@extends('layouts.viagens')

@section('title', 'Cadastrar Reembolso')

@section('content')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-lg-7 col-md-8 col-sm-12">
                <h6 class="text-info">Viagem para {{$nomeProrpiedade}}, do dia {{ date('d/m/Y', strtotime($viagem->data_entrada)) }} até
                    {{ date('d/m/Y', strtotime($viagem->data_saida)) }}</h6>
            </div>
            <div class="col-lg-5 col-md-4 col-sm-12 text-lg-right">
                <a class="btn btn-outline-dark" href="{{ url()->previous() }}">
                    << Voltar</a>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-5 col-sm-12">
            <div class="card p-5">
                <form action="{{ route('avaliacoes.enviar') }}" method="POST">
                    <div class="form-group">
                        @csrf
                        <label for="socio_id">Avaliador</label>
                        <input type="hidden" class="form-control" id="viagem_id" name="viagem_id"
                            value="{{ $viagem->id }}">
                        <select name="socio_id" class="form-control" id="socio_id">
                            @if (!in_array('1', $ids))
                                <option value="1" @if (old('socio_id') === '1') selected @endif>Carlos</option>
                            @endif
                            @if (!in_array('2', $ids))
                                <option value="2" @if (old('socio_id') === '2') selected @endif>José Luiz</option>
                            @endif
                            @if (!in_array('3', $ids))
                                <option value="3" @if (old('socio_id') === '3') selected @endif>Patrícia</option>
                            @endif
                            @if (!in_array('4', $ids))
                                <option value="4" @if (old('socio_id') === '4') selected @endif>Paula</option>
                            @endif
                        </select>
                        <input type="hidden" class="form-control" id="propriedade_id" name="propriedade_id"
                            value="{{ $viagem->propriedade_id }}">
                    </div>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card p-5">
                <h4>Avaliações Cadastradas</h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Detalhes</th>
                            <th scope="col">Link</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                    @foreach ($viagem->avaliacao as $avaliacao)
                        <tbody>
                            <tr>
                                <td>{{ $avaliacao->nome_socio }}</td>
                                <td><a class="btn btn-info">Ver</a></td>
                                <td>{{"https://pesquisa.avaliacao.info?avaliacao=$avaliacao->id&avaliador=.$avaliacao->socio_id&propriedade=$avaliacao->propriedade_id&viagem=$avaliacao->viagem_id"}}</td>
                                <td>
                                    <form action="{{ route('avaliacoes.destroy', $avaliacao->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn text-danger"
                                            onclick="return confirm('Quer mesmo deletar esta avaliação?')" type="submit"><i
                                                class="fas fa-trash-alt"></i> Avaliação</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
