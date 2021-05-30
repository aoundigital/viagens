@extends('layouts.viagens')

@section('title', 'Propriedades')

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

<div class="row clearfix">
    @foreach ($propriedades as $propriedade)
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card p-5">
                   <h4 class="theme-cyan text-ventura mb-3">{{ $propriedade->nome }}</h4>
                   <div class="text-secondary" >
                       <p>Quantidade de Viagens: <b>{{ $propriedade->viagem->count() }}</b></p>
                       <p>Quantidade de Avaliações: <b>{{ $propriedade->avaliacao->count() }}</b></p>
                   </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
