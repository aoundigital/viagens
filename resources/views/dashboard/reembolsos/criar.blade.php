@extends('layouts.app')

@section('title', 'Cadastrar Reembolso')

@section('content')
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <div class="card p-5">
                <form action="{{ route('reembolsos.enviar') }}" method="POST">
                    <div class="form-group">
                        @csrf
                        <input type="hidden" class="form-control" id="viagem_id" name="viagem_id" value="{{ $idViagem }}">
                        <label for="socio_id">Reembolsante</label>
                        <select name="socio_id" class="form-control" id="socio_id">
                            <option value="1" @if (old('socio_id') === '1') selected @endif>Carlos</option>
                            <option value="2" @if (old('socio_id') === '2') selected @endif>José Luiz</option>
                            <option value="3" @if (old('socio_id') === '3') selected @endif>Patrícia</option>
                            <option value="4" @if (old('socio_id') === '4') selected @endif>Paula</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
