@extends('layouts.viagens')

@section('title', 'Convidados')

@section('content')
    @foreach ($convidados as $convidado)
        <p>
            Nome: {{ $convidado->nome }} | {{ $convidado->id }}
        </p>
    @endforeach
@endsection
