@extends('layouts.app')

@section('title', 'Sócios')

@section('content')
    @foreach ($socios as $socio)
        <p>
            {{ $socio->nome }} | {{ $socio->id }}
        </p>
    @endforeach
@endsection
