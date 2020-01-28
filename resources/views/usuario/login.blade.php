@extends('principal')

@section('content')

    <div class="container text-center mt-5">
        <h1>LOGIN</h1>
        <div class="row justify-content-center">
            <div class="col-md-3 text-center">
                <form method="post" action="{{ action('ControladorUsuario@logar') }}">
                    @csrf
                    <p>Login</p>
                    <input type="text" name="login" value="{{old('login')}}">
                    <p>Senha</p>
                    <input type="password" name="senha" value="{{old('senha')}}">
                    <button class="btn btn-info mt-3" type="submit">Entrar</button>
                </form>
            </div>
        </div>
        <a class="linkCadastro" href="{{ action('ControladorUsuario@cadastro') }}">
            Ainda não tenho cadastro
        </a>
    </div>

    @if(isset($naoCadastrado))
        <div class="alert alert-danger">
            <strong>
                Erro!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </strong>
            <p>Não está cadastrado no sistema</p>
        </div>
    @endif

    @if(isset($senhaIncorreta))
        <div class="alert alert-danger">
            <strong>
                Erro!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </strong>
            <p>A senha está incorreta</p>
        </div>
    @endif

    @include('alert-danger')
@stop
