@extends('layouts.viagens')

@section('title', 'Cadastrar Pernoite')

@section('content')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-lg-7 col-md-8 col-sm-12">
                <h6 class="text-info">Viagem para {{$nomeProrpiedade}}, do dia {{ date('d/m/Y', strtotime($viagem->data_entrada)) }} até
                    {{ date('d/m/Y', strtotime($viagem->data_saida)) }}</h6>
            </div>
            <div class="col-lg-5 col-md-4 col-sm-12 text-lg-right">
                <a class="btn btn-outline-dark" href="{{ url()->previous() }}">
                    << Voltar</a>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-5 col-sm-12">
            <div class="card p-5">
                <form action="{{ route('pernoites.enviar') }}" method="POST">
                    <div class="form-group">
                        <div class="row clearfix">
                            @csrf
                            <div class="col-md-6 col-sm-12">
                                <input type="hidden" class="form-control" id="viagem_id" name="viagem_id"
                                    value="{{ $viagem->id }}">
                                <label for="numero_pessoas">Quantidade Pessoas</label>
                                <input type="number" class="form-control" name="numero_pessoas" id="numero_pessoas"
                                    value="{{ old('numero_pessoas') }}">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="socio_id">Principal</label>
                                    <select name="socio_id" class="form-control" id="socio_id">
                                        <option value="1" @if (old('socio_id') === '1') selected @endif>Carlos</option>
                                        <option value="2" @if (old('socio_id') === '2') selected @endif>José Luiz</option>
                                        <option value="3" @if (old('socio_id') === '3') selected @endif>Patrícia</option>
                                        <option value="4" @if (old('socio_id') === '4') selected @endif>Paula</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="data_entrada">Data de entrada</label>
                                    <input type="date" class="form-control" name="data_entrada" id="data_entrada"
                                        value="{{ old('data_entrada') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="data_saida">Data de saída</label>
                                    <input type="date" class="form-control" name="data_saida" id="data_saida"
                                        value="{{ old('data_saida') }}">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7 col-sm-12">
            <div class="card p-5">
                <h4>Pernoites Cadastradas</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Anfitrião</th>
                                <th scope="col">Entrada</th>
                                <th scope="col">Saida</th>
                                <th scope="col">Nº Pessoas</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        @foreach ($viagem->pernoite as $pernoite)
                            <tbody>
                                <tr>
                                    <td><b>
                                        @switch($pernoite->socio_id)
                                            @case(1)
                                                Carlos
                                                @break
                                            @case(2)
                                                José Luiz
                                                @break
                                            @case(3)
                                                Patrícia
                                                @break
                                            @case(4)
                                                Paula
                                                @break
                                        @endswitch
                                        </b>
                                    </td>
                                    <td>{{ date('d/m/Y', strtotime($pernoite->data_entrada)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($pernoite->data_saida)) }}</td>
                                    <td>{{ $pernoite->numero_pessoas }}</td>
                                    <td>
                                        <form action="{{ route('pernoites.destroy', $pernoite->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn text-danger" onclick="return confirm('Quer mesmo deletar este pernoite?')" type="submit">
                                                <i class="fas fa-trash-alt"></i> Pernoite
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
