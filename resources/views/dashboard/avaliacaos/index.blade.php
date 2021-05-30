@extends('layouts.viagens')

@section('title', 'Avaliações')

@section('content')
    @foreach ($avaliacaos as $avaliacao)
        <p>
            ID da Viagem: {{ $avaliacao->viagem_id }}
            | ID do Sócio: {{ $avaliacao->socio_id }}
            | ID da Propriedade: {{ $avaliacao->propriedads_id }}
        </p>
    @endforeach
@endsection
