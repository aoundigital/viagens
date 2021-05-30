@extends('layouts.viagens')

@section('title', 'Pernoites')

@section('content')
    @foreach ($pernoites as $pernoite)
        <p>
            Quantidade de Pessoas: {{ $pernoite->numero_pessoas }}
            | ID: {{ $pernoite->id }}
        </p>
    @endforeach
@endsection
