@extends('layouts.viagens')

@section('title', 'Emails - Lista e Cadastro')

@section('content')

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

    <div class="row clearfix mt-3">
        <div class="col-md-6 col-sm-12">
            <div class="card p-5">
                <form action="{{ route('emails.enviar') }}" method="POST">
                    <div class="row clearfix">
                        @csrf
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Emails</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card p-5">
                <h4>Avaliações Cadastradas</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        @foreach ($emails as $email)
                            <tbody>
                                <tr>
                                    <td>{{ $email->nome }}</td>
                                    <td>{{ $email->email }}</td>
                                    <td>
                                        <form id="formDel" action="{{ route('emails.destroy', $email->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn text-danger"
                                                onclick="return confirm('Quer mesmo deletar estea email?')" type="submit"><i
                                                    class="fas fa-trash-alt"></i> Email</button>
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
