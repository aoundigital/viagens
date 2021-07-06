@extends('layouts.viagens')

@section('title', 'Cadastrar Translado')

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
                <form action="{{ route('translados.enviar') }}" method="POST">
                    <div class="form-group">
                        @csrf
                        <input type="hidden" class="form-control" id="viagem_id" name="viagem_id"
                            value="{{ $idViagem }}">
                        <label for="prefixo">Prefixo Aeronave</label>
                        <input type="text" class="form-control" name="prefixo" id="prefixo" value="{{ old('prefixo') }}">
                    </div>
                    <div class="form-group">
                        <label for="horario">Horário do Voo</label>
                        <input type="text" class="form-control" name="horario" id="horario" value="{{ old('horario') }}">
                    </div>
                    <div class="form-group">
                        <label for="data">Data do Voo</label>
                        <input type="date" class="form-control" name="data" id="data" value="{{ old('data') }}">
                    </div>
                    <div class="form-group">
                        <label for="nome_socio">Sócio</label>
                        <select name="nome_socio" class="form-control" id="nome_socio">
                            <option value="Carlos">Carlos</option>
                            <option value="José Luiz">José Luiz</option>
                            <option value="Patrícia3">Patrícia</option>
                            <option value="Paula">Paula</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </form>
            </div>
        </div>
        <div class="col-md-7 col-sm-12">
            <div class="card p-5">
                <h4>Translados Cadastradas</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Sócio</th>
                            <th scope="col">Prefixo Aeronave</th>
                            <th scope="col">Horário do Voo</th>
                            <th scope="col">Data do Voo</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                    @foreach ($viagem->translado as $translado)
                        <tbody>
                            <tr>
                                <td>{{ $translado->nome_socio  }}</td>
                                <td>{{ $translado->prefixo }}</td>
                                <td>{{ $translado->horario }}</td>
                                <td>{{ date('d/m/Y', strtotime($translado->data)) }}</td>
                                <td>
                                    <form action="{{ route('translados.destroy', $translado->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn text-danger"
                                            onclick="return confirm('Quer mesmo deletar este translado?')" type="submit"><i
                                                class="fas fa-trash-alt"></i> Translado</button>
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
