@extends('layouts.viagens')

@section('title', 'Translados')

@section('content')
    @foreach ($translados as $translado)
        <p>
        Prefixo: {{ $translado->prefixo }} | Horario: {{ $translado->horario }}
        </p>
    @endforeach
@endsection
