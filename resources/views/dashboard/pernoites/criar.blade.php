@extends('layouts.viagens')

@section('title', 'Cadastrar Pernoite')

@section('content')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <h6 class="text-info">Viagem do dia {{  date('d/m/Y', strtotime($viagem->data_entrada)) }} até {{  date('d/m/Y', strtotime($viagem->data_saida)) }}</h6>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
                <a class="btn btn-outline-dark" href="{{ url()->previous() }}"><< Voltar</a>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <div class="card p-5">
                <form action="{{ route('pernoites.enviar') }}" method="POST">
                    <div class="form-group">
                        <div class="row clearfix">
                            @csrf
                            <div class="col-md-6 col-sm-12">
                                <input type="hidden" class="form-control" id="viagem_id" name="viagem_id"
                                    value="{{ $viagem->id }}">
                                <label for="numero_pessoas">Quantidade Pessoas</label>
                                <input type="number" class="form-control" name="numero_pessoas" id="numero_pessoas"
                                    value="{{ old('numero_pessoas') }}">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="socio_id">Principal</label>
                                    <select name="socio_id" class="form-control" id="socio_id">
                                        <option value="1" @if (old('socio_id') === '1') selected @endif>Carlos</option>
                                        <option value="2" @if (old('socio_id') === '2') selected @endif>José Luiz</option>
                                        <option value="3" @if (old('socio_id') === '3') selected @endif>Patrícia</option>
                                        <option value="4" @if (old('socio_id') === '4') selected @endif>Paula</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="data_entrada">Data de entrada</label>
                                    <input type="date" class="form-control" name="data_entrada" id="data_entrada"
                                        value="{{ old('data_entrada') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="data_saida">Data de saída</label>
                                    <input type="date" class="form-control" name="data_saida" id="data_saida"
                                        value="{{ old('data_saida') }}">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
