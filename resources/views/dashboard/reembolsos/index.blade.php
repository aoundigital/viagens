@extends('layouts.viagens')

@section('title', 'Reembolsos')

@section('content')
    <a href="{{ route('reembolsos.criar') }}">Criar novo Reembolso</a>

    @foreach ($reembolsos as $reembolso)
        <p>
            {{ $reembolso->nome_socio }} | {{ $reembolso->id }} <br>
            Id da Viagem:  {{ $reembolso->viagem_id }}
        </p>
    @endforeach
@endsection
