@extends('layouts.viagens')

@section('title', 'Detalhes da Avaliação')

@section('content')

{{-- Header --}}
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-7 col-md-8 col-sm-12">
            <h6 class="text-info">Avaliação | {{ $pesquisa->nome_socio }} | {{ $nomeProrpiedade }}</h6><br>
            {{-- Envio de Emails --}}
            <form action="{{ route('avaliacao.disparar_casa') }}" method="POST">
                @csrf
                <input type="hidden" class="form-control" id="tipo" name="tipo" value="1">
                <input type="hidden" class="form-control" id="idAvaliacao" name="idAvaliacao" value="{{ $pesquisa->id }}">
                <input type="hidden" class="form-control" id="mediasCasaAcomodacao" name="mediasCasaAcomodacao" value="{{ $mediasCasaAcomodacao}}">
                <input type="hidden" class="form-control" id="mediasCasaFuncionarios" name="mediasCasaFuncionarios" value="{{ $mediasCasaFuncionarios}}">
                <input type="hidden" class="form-control" id="mediasCasaEquipamentos" name="mediasCasaEquipamentos" value="{{ $mediasCasaEquipamentos}}">
                <input type="hidden" class="form-control" id="mediasCasaTi" name="mediasCasaTi" value="{{ $mediasCasaTi}}">
                <input type="hidden" class="form-control" id="nomeSocio" name="nomeSocio" value="{{ $pesquisa->nome_socio}}">
                <input type="hidden" class="form-control" id="nomeProrpiedade" name="nomeProrpiedade" value="{{ $nomeProrpiedade}}">
                {{-- Ocorrencias Casa --}}
                <input type="hidden" class="form-control" id="ocorrenciasCasaAcomodacao" name="ocorrenciasCasaAcomodacao" value="{{$pesquisa->casa->ocorrencia_acomodacoes}}">
                <input type="hidden" class="form-control" id="ocorrenciasCasaFuncionarios" name="ocorrenciasCasaFuncionarios" value="{{$pesquisa->casa->ocorrencia_funcionarios}} ">
                <input type="hidden" class="form-control" id="ocorrenciasCasaEquipamentos" name="ocorrenciasCasaEquipamentos" value="{{$pesquisa->casa->ocorrencia_equipamentos}} ">
                <input type="hidden" class="form-control" id="ocorrenciasCasaTi" name="ocorrenciasCasaTi" value="{{$pesquisa->casa->ocorrencia_ti}}">
                <button class="btn btn-primary" type="submit">Enviar Email</button>
            </form>
        </div>
        <div class="col-lg-5 col-md-4 col-sm-12 text-lg-right">
            <a class="btn btn-outline-dark" href="{{ url()->previous() }}">
                << Voltar</a>
        </div>
    </div>
</div>

{{-- Médias --}}
<div class="row clearfix">
    <div class="col-md-12 col-sm-12">
        <div class="text-center">
            <h4 class="text-info">Médias das Notas</h4>
            <div class="bg-ventura">
                <p class="pt-4">CASA</p>
                <div class="row pb-4">
                    <div class="col-md-3 col-sm-6">Acomodações: {{ number_format($mediasCasaAcomodacao, 2 ) }}</div>
                    <div class="col-md-3 col-sm-6">Funcionarios: {{ number_format($mediasCasaFuncionarios, 2 ) }}</div>
                    <div class="col-md-3 col-sm-6">Equipamentos: {{ number_format($mediasCasaEquipamentos, 2 ) }}</div>
                    <div class="col-md-3 col-sm-6">Tecnologia da Informação: {{ number_format($mediasCasaTi, 2 ) }}</div>
                </div>
            </div>
            <button class="btn btn-default mt-3" data-toggle="collapse" href="#notasCasa" role="button" aria-expanded="false" aria-controls="notasCasa">Notas da Casa</button>
        </div>
    </div>
</div>

{{-- Casa --}}
<div class="collapse" id="notasCasa">
    <div class="my-3 p-4 text-center bg-ventura"><h4>Casa</h4></div>
    <div class="row clearfix">
        {{-- Acomodações --}}
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card p-4">
                <h4 class="text-info">Acomodações</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-ventura">
                                <th scope="col">TIPOS</th>
                                <th scope="col">NOTAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Higiene / Limpeza</td>
                                <td>{{ $pesquisa->casa->acomoda_higiene }}</td>
                            </tr>
                            <tr>
                                <td>Organização / Conforto</td>
                                <td>{{ $pesquisa->casa->acomoda_conforto }}</td>
                            </tr>
                            <tr>
                                <td>Conservação / Funcionamento</td>
                                <td>{{ $pesquisa->casa->acomoda_conservacao }}</td>
                            </tr>
                            <tr>
                                <td>Alimentos / bebidas</td>
                                <td>{{ $pesquisa->casa->acomoda_alimentacao }}</td>
                            </tr>
                            <tr>
                                <td>Segurança / Tranquilidade</td>
                                <td>{{ $pesquisa->casa->acomoda_seguranca }}</td>
                            </tr>
                            <tr class="text-info">
                                <td><strong>Média Geral</strong></td>
                                <td><strong>{{ number_format($mediasCasaAcomodacao, 2 ) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <p><i>Ocorrências: <span class="text-ventura">{{ $pesquisa->casa->ocorrencia_acomodacoes }}</span></i></p>
                </div>
            </div>
        </div>
        {{-- FIM Acomodações --}}
        {{-- Funcionarios --}}
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card p-4">
                <h4 class="text-info">Funcionarios</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-ventura">
                                <th scope="col">TIPOS</th>
                                <th scope="col">NOTAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Educação</td>
                                <td>{{ $pesquisa->casa->funcionarios_educacao }}</td>
                            </tr>
                            <tr>
                                <td>Simpatia</td>
                                <td>{{ $pesquisa->casa->funcionarios_simpatia }}</td>
                            </tr>
                            <tr>
                                <td>Uniforme / Higiene</td>
                                <td>{{ $pesquisa->casa->funcionarios_higiene }}</td>
                            </tr>
                            <tr>
                                <td>Proatividade / Serviços</td>
                                <td>{{ $pesquisa->casa->funcionarios_proativo }}</td>
                            </tr>
                            <tr>
                                <td>Confiança / Honestidade</td>
                                </td>
                                <td>{{ $pesquisa->casa->funcionarios_honesto }}</td>
                            </tr>
                            <tr class="text-info">
                                <td><strong>Média Geral</strong></td>
                                <td><strong>{{ number_format($mediasCasaFuncionarios, 2 ) }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p><i>Ocorrências: <span class="text-ventura">{{ $pesquisa->casa->ocorrencia_funcionarios }}</span></i></p>
                </div>
            </div>
        </div>
        {{-- FIM Funcionarios --}}
        {{-- Equipamentos --}}
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card p-4">
                <h4 class="text-info">Equipamentos</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-ventura">
                                <th scope="col">TIPOS</th>
                                <th scope="col">NOTAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Veículos</td>
                                <td>{{ $pesquisa->casa->equipamento_veiculo }}</td>
                            </tr>
                            <tr>
                                <td>Motos</td>
                                <td>{{ $pesquisa->casa->equipamento_moto }}</td>
                            </tr>
                            <tr>
                                <td>Quadriciclos / Mini buggy</td>
                                <td>{{ $pesquisa->casa->equipamento_quadriciclo }}</td>
                            </tr>
                            <tr>
                                <td>Ar condicionado / Gerador</td>
                                <td>{{ $pesquisa->casa->equipamento_ar }}</td>
                            </tr>
                            <tr>
                                <td>Carrinho de Golf</td>
                                </td>
                                <td>{{ $pesquisa->casa->equipamento_golf }}</td>
                            </tr>
                            <tr class="text-info">
                                <td><strong>Média Geral</strong></td>
                                <td><strong>{{ number_format($mediasCasaEquipamentos, 2 ) }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p><i>Ocorrências: <span class="text-ventura">{{ $pesquisa->casa->ocorrencia_equipamentos }}</span></i></p>
                </div>
            </div>
        </div>
        {{-- FIM Equipamentos --}}
        {{-- Tecnologia --}}
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card p-4">
                <h4 class="text-info">Tecnologia (TI)</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-ventura">
                                <th scope="col">TIPOS</th>
                                <th scope="col">NOTAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Automação / Internet</td>
                                <td>{{ $pesquisa->casa->ti_internet }}</td>
                            </tr>
                            <tr>
                                <td>Informática / Telefonia</td>
                                <td>{{ $pesquisa->casa->ti_telefone }}</td>
                            </tr>
                            <tr>
                                <td>TV a cabo - NET / SKY</td>
                                <td>{{ $pesquisa->casa->ti_tv }}</td>
                            </tr>
                            <tr class="text-info">
                                <td><strong>Média Geral</strong></td>
                                <td><strong>{{ number_format($mediasCasaTi, 2 ) }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p><i>Ocorrências: <span class="text-ventura">{{ $pesquisa->casa->ocorrencia_ti }}</span></i></p>
                </div>
            </div>
        </div>
        {{-- FIM Tecnologia --}}
    </div>
</div>

@endsection
