@extends('principal')
@extends('navbar')

@section('content')

    <div class="container text-center mt-5">
        <h1>NOVO PRODUTO</h1>
        <div class="row justify-content-center">
            <div class="col-md-3 text-center">
                <form method="POST" action="{{ action('ControladorProduto@salvarCriacao') }}">
                    @csrf
                    <p>Nome do Produto</p>
                    <input type="text" name="nome" value="{{old('nome')}}"></label>
                    <p>Valor do Produto</p>
                    <input type="text" name="valor" value="{{old('valor')}}"></label>

                    <select name="categoriaEscolhida" class="float-left mt-3">
                        @foreach($categorias as $categoria)
                            <option>{{$categoria->nome}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-info mt-3 float-right">Salvar</button>
                </form>
            </div>
        </div>
    </div>

    @include('alert-danger')
@stop
