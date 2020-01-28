@extends('principal')
@extends('navbar')

@section('content')

    <div class="container text-center mt-5">
        <h1>EDITAR CATEGORIA</h1>
        <div class="row justify-content-center">
            <div class="col-md-3 text-center">
                <form method="POST" action="{{ action('ControladorCategoria@salvarEdicao',$categoria->id) }}">
                    @csrf
                    <p>Nome</p>
                    <input type="text" name="nome" value="{{$categoria->nome}}">
                    <button class="btn btn-info mt-3">
                        Salvar
                    </button>
                </form>
            </div>
        </div>
    </div>

    @include('alert-danger')
@stop
