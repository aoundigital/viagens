@extends('layouts.viagens')

@section('title', 'Viagens')

@section('content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <a class="btn btn-dark" href="{{ route('viagens.criar') }}">Criar nova Viagem</a>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
            </div>
        </div>
    </div>

    <div class="row clearfix">
        @foreach ($viagens as $viagem)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card p-5">
            Estadia: {{ $viagem->quantidade_dias }} dias<br>
            {{-- tratando a data para pt_br --}}
            Entrada: {{ date('d/m/Y', strtotime($viagem->data_entrada)) }} <br>
            {{-- dado de outra tabela --}}
            Propriedade: {{ $viagem->propriedade->nome }} <br>
            {{-- array de reembolsos --}}
            Reembolso: {{$viagem->reembolso->count()}} | <a href="{{ route('reembolsos.criar', ['idViagem' => $viagem->id]) }}">Criar Reembolso</a>
            @if ($viagem->reembolso->count() != 0)
            =>
                @foreach ( $viagem->reembolso as $remb )
                    {{ $remb->nome_socio }},
                @endforeach
            @endif
            <br>
            {{-- array de pernoites --}}
            @php $sum = 0; @endphp
            Pernoite: {{$viagem->pernoite->count()}} | <a href="{{ route('pernoites.criar', ['idViagem' => $viagem->id]) }}">Criar Pernoite</a>
            @if ($viagem->pernoite->count() != 0)
                @foreach ( $viagem->pernoite as $per )
                    @php $sum += $per['numero_pessoas'] @endphp
                @endforeach
                @if ($sum != 0)
                    => {{ $sum }} pessoas
                @endif
            @endif

            <br>
            {{-- array de translados --}}
            Translado: {{ $viagem->translado->count() }} | <a href="{{ route('translados.criar', ['idViagem' => $viagem->id]) }}">Criar Translado</a>
                @if ($viagem->translado->count() != 0)
                    =>
                    @foreach ( $viagem->translado as $trans )
                        {{ $trans->prefixo }} |
                    @endforeach
                @endif
            <br>
                Avaliações: {{$viagem->avaliacao->count()}} | <a href="{{ route('avaliacoes.criar', ['idViagem' => $viagem->id, 'idPropriedade' => $viagem->propriedade_id]) }}">Criar Avaliação</a>

                @if ($viagem->avaliacao->count() != 0)
                =>
                @foreach ( $viagem->avaliacao as $aval )
                    {{ $aval->nome_socio }},
                @endforeach
            @endif
        </div>

        </div>
        @endforeach
    </div>

@endsection
