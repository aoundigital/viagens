@extends('layouts.app')

@section('title', 'Convidados')

@section('content')
    @foreach ($convidados as $convidado)
        <p>
            Nome: {{ $convidado->nome }} | {{ $convidado->id }}
        </p>
    @endforeach
@endsection
