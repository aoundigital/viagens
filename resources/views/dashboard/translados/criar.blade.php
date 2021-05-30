@extends('layouts.app')

@section('title', 'Cadastrar Translado')

@section('content')
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
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
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
