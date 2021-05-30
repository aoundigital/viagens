@extends('layouts.viagens')

@section('title', 'Casas')

@section('content')
    @foreach ($casas as $casa)
        <p>
            Nota Higiene: {{ $casa->acomoda_higiene }}
            | Id da Avaliação: {{ $casa->avaliacao_id }}
        </p>
    @endforeach
@endsection
