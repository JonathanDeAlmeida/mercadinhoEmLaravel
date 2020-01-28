@extends('principal')
@extends('navbar')

@section('content')

    <div class="container text-center mt-5">
        <h1>CATEGORIA</h1>
        <div class="row">
            <div class="col-md-12 text-center">
                <table class="table table-info">
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>EDITAR</th>
                        <th>EXCLUIR</th>
                    </tr>
                    @foreach($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->id}}</td>
                        <td>{{$categoria->nome}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ action('ControladorCategoria@editar',$categoria->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ action('ControladorCategoria@deletar',$categoria->id) }}">
                                Excluir
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <a class="btn btn-primary float-left" href="{{ action('ControladorCategoria@criar') }}">Criar</a>
            </div>
        </div>
    </div>

    @if(old('nome'))
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
