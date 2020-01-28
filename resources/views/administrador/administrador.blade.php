@extends('principal')
@extends('navbar')
@section('content')

    <div class="container text-center mt-5">
        <h1>Administrador</h1>
        <div class="row justify-content-center">
            <div class="card-group">
                <div class="card">
                    <img class="card-img-top" height="200px" src="https://images.freeimages.com/images/premium/previews/3054/30541180-falling-money-euro.jpg" alt="Imagem de capa do card">
                    <div class="card-body">
                        <a class="btn btn-success" href="{{ action('ControladorVenda@listar') }}">
                            VENDAS
                        </a>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top"  height="200px" src="http://www.avmpmpr.com.br/site/wp-content/uploads/2018/11/cadastro.png" alt="">
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ action('ControladorUsuario@cadastro') }}">
                            CADASTRO
                        </a>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top"  height="200px" src="https://cdn-cv.r4you.co/wp-content/uploads/2015/009/img/noticias/walmat-ponta-a-ponta.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ action('ControladorProduto@listar') }}">
                            PRODUTOS
                        </a>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top"  height="200px" src="http://www.efd.com.br/images/site/CapaProdutos.png" alt="">
                    <div class="card-body">
                        <a class="btn btn-info" href="{{ action('ControladorCategoria@listar') }}">
                            CATEGORIAS
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
