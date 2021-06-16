@extends('layouts.viagens')

@section('title', 'Detalhes da Avaliação')

@section('content')

{{-- Header --}}
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-7 col-md-8 col-sm-12">
            <h6 class="text-info">Avaliação | {{ $pesquisa->nome_socio }} | {{ $nomeProrpiedade }}</h6>
            {{-- Envio de Email --}}
            <form action="{{ route('avaliacao.disparar_barco') }}" method="POST">
                @csrf
                <input type="hidden" class="form-control" id="idAvaliacao" name="idAvaliacao" value="{{ $pesquisa->id }}">
                <input type="hidden" class="form-control" id="mediasCasaAcomodacao" name="mediasCasaAcomodacao" value="{{ $mediasCasaAcomodacao}}">
                <input type="hidden" class="form-control" id="mediasCasaFuncionarios" name="mediasCasaFuncionarios" value="{{ $mediasCasaFuncionarios}}">
                <input type="hidden" class="form-control" id="mediasCasaEquipamentos" name="mediasCasaEquipamentos" value="{{ $mediasCasaEquipamentos}}">
                <input type="hidden" class="form-control" id="mediasCasaTi" name="mediasCasaTi" value="{{ $mediasCasaTi}}">
                <input type="hidden" class="form-control" id="nomeSocio" name="nomeSocio" value="{{ $pesquisa->nome_socio}}">
                <input type="hidden" class="form-control" id="nomeProrpiedade" name="nomeProrpiedade" value="{{ $nomeProrpiedade}}">
                <input type="hidden" class="form-control" id="mediasBarcoAcomodacao" name="mediasBarcoAcomodacao" value="{{ $mediasBarcoAcomodacao}}">
                <input type="hidden" class="form-control" id="mediasBarcoFuncionarios" name="mediasBarcoFuncionarios" value="{{ $mediasBarcoFuncionarios}}">
                @if ($idPropriedade == 3)
                    <input type="hidden" class="form-control" id="mediasBarcoEquipamentosAvare" name="mediasBarcoEquipamentosAvare" value="{{ $mediasBarcoEquipamentosAvare}}">
                @else
                    <input type="hidden" class="form-control" id="mediasBarcoEquipamentosAngra" name="mediasBarcoEquipamentosAngra" value="{{ $mediasBarcoEquipamentosAngra}}">
                @endif
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
                    <div class="col-md-3 col-sm-6">Acomodações: {{ $mediasCasaAcomodacao }}</div>
                    <div class="col-md-3 col-sm-6">Funcionarios: {{ $mediasCasaFuncionarios }}</div>
                    <div class="col-md-3 col-sm-6">Equipamentos: {{ $mediasCasaEquipamentos }}</div>
                    <div class="col-md-3 col-sm-6">Tecnologia da Informação: {{ $mediasCasaTi }}</div>
                </div>
            </div>
            <div class="bg-info">
                <p class="pt-4">BARCO</p>
                <div class="row pb-4">
                    <div class="col-md-4 col-sm-6">Acomodações: {{ $mediasBarcoAcomodacao }}</div>
                    <div class="col-md-4 col-sm-6">Funcionarios: {{ $mediasBarcoFuncionarios }}</div>
                    @if ($idPropriedade == 3)
                    <div class="col-md-4 col-sm-6">Equipamentos: {{ $mediasBarcoEquipamentosAvare }}</div>
                    @else
                    <div class="col-md-4 col-sm-6">Equipamentos: {{ $mediasBarcoEquipamentosAngra }}</div>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <button class="btn btn-default" data-toggle="collapse" href="#notasCasa" role="button" aria-expanded="false" aria-controls="notasCasa">Notas de Casa</button>
                <button class="btn btn-default ml-4" data-toggle="collapse" href="#notasBarco" role="button" aria-expanded="false" aria-controls="notasBarco">Notas de Barco</button>
            </div>
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
                                <td><strong>{{ $mediasCasaAcomodacao }}</strong></td>
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
                                <td><strong>{{ $mediasCasaFuncionarios }}</strong>
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
                                <td><strong>{{ $mediasCasaEquipamentos }}</strong>
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
                                <td><strong>{{ $mediasCasaTi }}</strong>
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

{{-- Barco --}}
<div class="collapse" id="notasBarco">
    <div class="my-3 p-4 text-center bg-info"><h4>Barco</h4></div>
    <div class="row clearfix">
        {{-- Acomodações --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
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
                                <td>{{ $pesquisa->barco->acomoda_higiene }}</td>
                            </tr>
                            <tr>
                                <td>Organização / Conforto</td>
                                <td>{{ $pesquisa->barco->acomoda_conforto }}</td>
                            </tr>
                            <tr>
                                <td>Conservação / Funcionamento</td>
                                <td>{{ $pesquisa->barco->acomoda_conservacao }}</td>
                            </tr>
                            <tr>
                                <td>Alimentos / bebidas</td>
                                <td>{{ $pesquisa->barco->acomoda_alimentacao }}</td>
                            </tr>
                            <tr>
                                <td>Segurança / Tranquilidade</td>
                                <td>{{ $pesquisa->barco->acomoda_seguranca }}</td>
                            </tr>
                            <tr class="text-info">
                                <td><strong>Média Geral</strong></td>
                                <td><strong>{{ $mediasBarcoAcomodacao }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <p><i>Ocorrências: <span class="text-ventura">{{ $pesquisa->barco->ocorrencia_acomodacoes }}</span></i></p>
                </div>
            </div>
        </div>
        {{-- FIM Acomodações --}}
        {{-- Funcionarios --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
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
                                <td>{{ $pesquisa->barco->funcionarios_educacao }}</td>
                            </tr>
                            <tr>
                                <td>Simpatia</td>
                                <td>{{ $pesquisa->barco->funcionarios_simpatia }}</td>
                            </tr>
                            <tr>
                                <td>Uniforme / Higiene</td>
                                <td>{{ $pesquisa->barco->funcionarios_higiene }}</td>
                            </tr>
                            <tr>
                                <td>Proatividade / Serviços</td>
                                <td>{{ $pesquisa->barco->funcionarios_proativo }}</td>
                            </tr>
                            <tr>
                                <td>Confiança / Honestidade</td>
                                <td>{{ $pesquisa->barco->funcionarios_honesto }}</td>
                            </tr>
                            <tr class="text-info">
                                <td><strong>Média Geral</strong></td>
                                <td><strong>{{ $mediasBarcoFuncionarios }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p><i>Ocorrências: <span class="text-ventura">{{ $pesquisa->barco->ocorrencia_funcionarios }}</span></i></p>
                </div>
            </div>
        </div>
        {{-- FIM Funcionarios --}}
        {{-- Equipamentos --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
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
                            @if ($idPropriedade == 3)
                            <tr>
                                <td>Eagle 29</td>
                                <td>{{ $pesquisa->barco->equipamento_eagle }}</td>
                            </tr>
                            <tr>
                                <td>Eagle - Esquimar 20</td>
                                <td>{{ $pesquisa->barco->equipamento_esquimar }}</td>
                            </tr>
                            <tr>
                                <td>Jet-sky / Jet-boat</td>
                                <td>{{ $pesquisa->barco->equipamento_jet }}</td>
                            </tr>
                            @else
                            <tr>
                                <td>Papacalu 83</td>
                                <td>{{ $pesquisa->barco->equipamento_papacalu_83 }}</td>
                            </tr>
                            <tr>
                                <td>Papacalu 58</td>
                                <td>{{ $pesquisa->barco->equipamento_papacalu_58 }}</td>
                            </tr>
                            <tr>
                                <td>Papacalu 41</td>
                                <td>{{ $pesquisa->barco->equipamento_papacalu_41 }}</td>
                            </tr>
                            <tr>
                                <td>Jet-sky / Jet-boat</td>
                                <td>{{ $pesquisa->barco->equipamento_jet }}</td>
                            </tr>
                            @endif
                            <tr class="text-info">
                                <td><strong>Média Geral</strong></td>
                                @if ($idPropriedade == 3)
                                <td><strong>{{ $mediasBarcoEquipamentosAvare }}</strong>
                                @else
                                <td><strong>{{ $mediasBarcoEquipamentosAngra }}</strong>
                                @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p><i>Ocorrências: <span class="text-ventura">{{ $pesquisa->barco->ocorrencia_equipamentos }}</span></i></p>
                </div>
            </div>
        </div>
        {{-- FIM Equipamentos --}}
    </div>
</div>

@endsection
