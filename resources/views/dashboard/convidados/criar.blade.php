@extends('layouts.app')

@section('title', 'Cadastrar Convidados')

@section('content')
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <div class="card p-5">
                <form action="{{ route('convidados.enviar') }}" method="POST">
                    <div class="form-group">
                        @csrf
                        <input type="hidden" class="form-control" id="pernoite_id" name="pernoite_id"
                            value="{{ $idPernoite }}">
                        <label for="nome">Nomes dos Convidados (separar por vírgula)</label><br>
                        <textarea class="form-control" type="text" name="nome" id="nome"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
