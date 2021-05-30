@extends('layouts.app')

@section('title', 'Cadastrar Reembolso')

@section('content')
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <div class="card p-5">
                <form action="{{ route('avaliacoes.enviar') }}" method="POST">
                    <div class="form-group">
                        @csrf
                        <label for="socio_id">Avaliador</label>
                        <input type="hidden" class="form-control" id="viagem_id" name="viagem_id"
                            value="{{ $idViagem }}">
                        <select class="form-control" name="socio_id" id="socio_id">
                            <option value="1" @if (old('socio_id') === '1') selected @endif>Carlos</option>
                            <option value="2" @if (old('socio_id') === '2') selected @endif>José Luiz</option>
                            <option value="3" @if (old('socio_id') === '3') selected @endif>Patrícia</option>
                            <option value="4" @if (old('socio_id') === '4') selected @endif>Paula</option>
                        </select>
                        <input type="hidden" class="form-control" id="propriedade_id" name="propriedade_id"
                            value="{{ $idPropriedade }}">
                    </div>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
