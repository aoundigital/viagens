@extends('layouts.viagens')

@section('title', 'Avaliadores')

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
        @foreach ($socios as $socio)
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card p-5">
                       <h4 class="text-ventura mb-3">{{ $socio->nome }}</h4>
                       <p>Quant. de Avaliações: <b>{{ $socio->avaliacao->count() }} </b></p>
                </div>
            </div>
        @endforeach
    </div>

@endsection
