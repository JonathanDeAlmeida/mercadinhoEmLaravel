
<nav class="navbar navbar-light bg-dark mb-5 text-center">
    <a href="{{ action('ControladorAdministrador@entrar') }}">PAINEL DE CONTROLE</a>
    <div class="text-center">
        <div>
            <div>
                <a href="{{ action('ControladorVenda@listar') }}">VENDAS</a>
                <a href="{{ action('ControladorUsuario@cadastro') }}">CADASTRO</a>
                <a href="{{ action('ControladorProduto@listar') }}">PRODUTOS</a>
                <a href="{{ action('ControladorCategoria@listar') }}">CATEGORIAS</a>
            </div>
        </div>
    </div>
    <a href="{{ action('ControladorUsuario@login') }}">SAIR DO SISTEMA</a>
</nav>

