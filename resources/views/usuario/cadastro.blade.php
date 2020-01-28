@extends('principal')

@if($administrador)
    @include('navbar')
@endif

@section('content')

    <div class="container text-center mt-5">
        <h1>CADASTRO</h1>
        <div class="row justify-content-center">
            <div class="col-md-3 text-center">
                <form method="post" action="{{ action('ControladorUsuario@cadastrar') }}">
                    @csrf
                    <p>Nome</p>
                    <input type="text" name="nome" value="{{old('nome')}}">
                    <p>Login</p>
                    <input type="text" name="login" value="{{old('login')}}">
                    <p>Senha</p>
                    <input style="margin-bottom: 20px" type="password" name="senha" value="{{old('senha')}}">

                    @if($administrador)
                        Você é um Administrador ?
                        <label class="d-block">SIM<input type="checkbox" name="admin"></label>
                    @endif
                    <button class="btn btn-info">Cadastrar</button>
                </form>
            </div>
        </div>
        @if(!$administrador)
            <a class="linkLogin"  href="{{ action('ControladorUsuario@login') }}">
                FAZER LOGIN
            </a>
        @endif
    </div>

    @if(isset($cadastrado))
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

    @include('alert-danger')
@stop


