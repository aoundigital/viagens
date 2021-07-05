@extends('layouts.viagens')

@section('title', 'Cadastrar uma nova Viagem')

@section('content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <a class="btn btn-outline-dark" href="{{ url()->previous() }}">
                    << Voltar</a>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">

            </div>
        </div>
    </div>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="row clearfix mt-3">
        <div class="col-md-8 col-sm-12">
            <div class="card p-5">
                <form action="{{ route('viagens.enviar') }}" method="POST">
                    <div class="row clearfix">
                        @csrf
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="propriedade_id">Propriedade</label>
                                <select class="form-control" name="propriedade_id" id="propriedade_id">
                                    <option value="1" @if (old('propriedade_id') === '1') selected @endif>Campos do Jordão</option>
                                    <option value="2" @if (old('propriedade_id') === '2') selected @endif>Guarujá</option>
                                    <option value="3" @if (old('propriedade_id') === '3') selected @endif>Avaré / Arandu</option>
                                    <option value="4" @if (old('propriedade_id') === '4') selected @endif>Angra dos Reis</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="data_entrada">Data de entrada</label>
                                <input type="date" class="form-control" name="data_entrada" id="data_entrada"
                                    value="{{ old('data_entrada') }}">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
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
