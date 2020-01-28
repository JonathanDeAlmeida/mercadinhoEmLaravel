@extends('principal')
@extends('navbar')

@section('content')

    <div class="container text-center mt-5">
        <h1>PRODUTOS</h1>
        <div class="row">
            <div class="col-md-12 text-center">
                {{$categoriaEscolhida ?? ''}}
                <table class="table table-info">
                    <tr>
                        <th>NOME</th>
                        <th>VALOR</th>
                        <th>CATEGORIA</th>
                        <th>EDITAR</th>
                        <th>EXCLUIR</th>
                    </tr>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->valor}}</td>
                            <td>{{$produto->nomeCategoria}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ action('ControladorProduto@editar',$produto->id) }}">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ action('ControladorProduto@deletar',$produto->id) }}">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <a class="btn btn-primary float-left" href="{{ action('ControladorProduto@criar') }}">Criar</a>
            </div>
        </div>
    </div>

    @if(old('nome') and old('valor'))
        <div class="alert alert-success">
            <strong>
                Sucesso
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </strong>
            Operação realizada com sucesso!!!
        </div>
    @endif
@stop
