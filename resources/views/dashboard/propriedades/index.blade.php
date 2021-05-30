@extends('layouts.viagens')

@section('title', 'Propriedades')

@section('content')
    @foreach ($propriedades as $propriedade)
        <p>
            {{ $propriedade->nome }} | {{ $propriedade->id }} | {{ isset($propriedade->viagem) }}
        </p>
    @endforeach
@endsection
