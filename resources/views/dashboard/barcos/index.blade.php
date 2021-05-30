@extends('layouts.app')

@section('title', 'Barcos')

@section('content')
    @foreach ($barcos as $barco)
        <p>
            Nota Higiene: {{ $barco->acomoda_higiene }}
            | Id da Avaliação: {{ $barco->avaliacao_id }}
        </p>
    @endforeach
@endsection
