@extends('principal')
@extends('navbar')

@section('content')

    <div class="container text-center mt-5">
        <h1>NOVA CATEGORIA</h1>
        <div class="row justify-content-center">
            <div class="col-md-3 text-center">
                <form method="POST" action="{{ action('ControladorCategoria@salvarCriacao') }}">
                    @csrf
                    <p class="mt-5">Nome da Categoria </p>
                    <input type="text" name="nome" value="{{old('nome')}}">
                    <button class="btn btn-info mt-3">Salvar</button>
                </form>
            </div>
        </div>
    </div>

    @include('alert-danger')
@stop
