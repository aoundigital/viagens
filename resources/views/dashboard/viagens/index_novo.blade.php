@extends('layouts.viagens')

@section('title', 'Viagens')

@section('content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <a class="btn btn-dark" href="{{ route('viagens.criar') }}">Criar nova Viagem</a>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
               <h6> Tabela com {{ $viagens->count() }} @if ( $viagens->count() > 1 ) viagens @else  Viagem @endif </h6>
            </div>
        </div>
    </div>

    @if(session('mensagem'))
        <div class="row clearfix">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('mensagem') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif


    <div class="row clearfix">
        <div class="col-12">
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Propriedade</th>
                                            <th scope="col">Entrada</th>
                                            <th scope="col">Estadia</th>
                                            <th scope="col">Reembolso</th>
                                            <th scope="col">Translado</th>
                                            <th scope="col">Pernoite</th>
                                            <th scope="col">Avaliações</th>
                                            <th scope="col">Excluir</th>
                                        </tr>
                                    </thead>
                                    @foreach ($viagens as $viagem)
                                    <tbody>
                                        <tr>
                                            {{-- Propriedade --}}
                                            <td>
                                                <b>{{ $viagem->propriedade->nome }}</b>
                                            </td>
                                            {{-- Entrada --}}
                                            <td>
                                                {{ date('d/m/Y', strtotime($viagem->data_entrada)) }}
                                            </td>
                                            {{-- Estadia --}}
                                            <td>
                                                {{ $viagem->quantidade_dias }} dias
                                            </td>
                                            {{-- Reembolso --}}
                                            <td>
                                               Total:  {{$viagem->reembolso->count()}}<br>
                                                <a class="btn btn-primary btn-sm" href="{{ route('reembolsos.criar', ['idViagem' => $viagem->id]) }}">Reembolsos</a>
                                                @if ($viagem->reembolso->count() != 0)
                                                <br>
                                                    @foreach ( $viagem->reembolso as $remb )
                                                      <small>{{ $remb->nome_socio }},</small>
                                                    @endforeach
                                                @endif
                                            </td>
                                            {{-- Translado --}}
                                            <td>
                                                Total:  {{ $viagem->translado->count() }}
                                                {{-- @if ($viagem->translado->count() != 0)
                                                    =>
                                                    @foreach ( $viagem->translado as $trans )
                                                        {{ $trans->prefixo }} |
                                                    @endforeach
                                                @endif --}}
                                                <br><a class="btn btn-info btn-sm" href="{{ route('translados.criar', ['idViagem' => $viagem->id]) }}">Translados</a>
                                            </td>
                                            {{-- Pernoite --}}
                                            <td>
                                                @php
                                                    $sum = 0;
                                                @endphp
                                                Total: {{$viagem->pernoite->count()}}
                                                @if ($viagem->pernoite->count() != 0)
                                                    @foreach ( $viagem->pernoite as $per )
                                                        @php $sum += $per['numero_pessoas'] @endphp
                                                    @endforeach

                                                    @if ($sum != 0)
                                                        com {{ $sum }} pessoas
                                                    @endif
                                                @endif
                                                <br><a class="btn btn-info btn-sm" href="{{ route('pernoites.criar', ['idViagem' => $viagem->id]) }}">Pernoites</a>
                                            </td>
                                            {{-- Avaliações --}}
                                            <td>
                                                Total: {{$viagem->avaliacao->count()}}
                                                <br> <a class="btn btn-dark btn-sm" href="{{ route('avaliacoes.criar', ['idViagem' => $viagem->id, 'idPropriedade' => $viagem->propriedade_id]) }}">Avaliações</a>
                                                @if ($viagem->avaliacao->count() != 0) <br>
                                                    @foreach ( $viagem->avaliacao as $aval )
                                                       <small>{{ $aval->nome_socio }},</small>
                                                    @endforeach
                                                @endif
                                            </td>
                                            {{-- Excluir --}}
                                            <td>
                                                <form action="{{ route('viagens.destroy', $viagem->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn text-danger" onclick="return confirm('Quer mesmo deletar esta viagem?')" type="submit"><i class="fas fa-trash-alt"></i> Viagem</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="my-4">
                            {{ $viagens->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
