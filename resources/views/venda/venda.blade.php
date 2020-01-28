@extends('principal')

@if($administrador)
@include('navbar')
@endif

@section('content')

<div class="container text-center mt-5">
    <h1>VENDA</h1>
    <div class="row">
        <div class="col-md-12 text-center">
            <div id="app">
                <template>
                    <table class="table table-info table-sm">
                        <thead>
                        <th>NOME DO PRODUTO</th>
                        <th>COMPRAR</th>
                        <th>REMOVER</th>
                        <th>QUANTIDADE</th>
                        <th>VALOR</th>
                        <th>TOTAL POR PRODUTO</th>
                        <th>TOTAL VENDA</th>
                        </thead>
                        <tbody v-for="(item, index) of produtos">
                        <td><h6>@{{item.nome}}</h6></td>
                        <td><button class="btn btn-success btn-sm" @click="comprar(index)">Comprar</button></td>
                        <td><button class="btn btn-danger btn-sm" @click="remover(index)">Remover</button></td>
                        <td>@{{item.quantidadeVendaProduto}}</td>
                        <td>@{{item.valor}}</td>
                        <td>@{{item.totalVendaProduto}}</td>
                        <td>@{{totalVenda}}</td>
                        </tbody>
                    </table>
                </template>

                <a class="btn btn-info float-left" href="{{ action('ControladorUsuario@login') }}">Sair do Sistema</a>

                <form method="post" action="{{ action('ControladorVenda@finalizar') }}">
                    @csrf
                    <input type="hidden" name="dados" :value="dados">
                    <button @click="finalizarCompra" class="btn btn-success float-right">Finalizar Compra</button>
                </form>
            </div>
        </div>
    </div>
</div>

@if(isset($finalizada))
    <div class="alert alert-success">
        <strong>
            Sucesso
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </strong>
        <p>Venda no valor de R$ {{$totalVenda}} realizada com sucesso!!!</p>
    </div>
@endif

<script>
    var vm = new Vue({
        el: '#app',
        data: {
            produtos: [],
            totalVenda: 0,
            quantidadeVenda: 0,
            arredondadoTotalCompra: 0,
            produtosComprados: [],
            dados: []
        },

        methods: {
            comprar: function(index) {
                vm.produtos[index].quantidadeVendaProduto++
                vm.quantidadeVenda++

                vm.produtos[index].totalVendaProduto = vm.produtos[index].quantidadeVendaProduto * vm.produtos[index].valor
                arredondaValorTotalProduto = parseFloat(vm.produtos[index].totalVendaProduto.toFixed(2))
                vm.produtos[index].totalVendaProduto = arredondaValorTotalProduto

                vm.arredondadoTotalCompra += parseFloat(vm.produtos[index].valor)
                vm.totalVenda = parseFloat(vm.arredondadoTotalCompra.toFixed(2))

            },
            remover: function(index) {
                if (vm.produtos[index].quantidadeVendaProduto > 0) {

                    vm.produtos[index].quantidadeVendaProduto--
                    vm.quantidadeVenda--

                    vm.produtos[index].totalVendaProduto = vm.produtos[index].quantidadeVendaProduto * vm.produtos[index].valor
                    arredondaValorProduto = parseFloat(vm.produtos[index].totalVendaProduto.toFixed(2))
                    vm.produtos[index].totalVendaProduto = arredondaValorProduto

                    vm.arredondadoTotalCompra -= parseFloat(vm.produtos[index].valor)
                    vm.totalVenda = parseFloat(vm.arredondadoTotalCompra.toFixed(2))
                }
            },
            finalizarCompra: function () {
                produtosComprados = []
                for (count = 0; count < vm.produtos.length; count++) {
                    if (vm.produtos[count].quantidadeVendaProduto > 0) {
                        produtosComprados.push(vm.produtos[count])
                    }
                }
                dados =  {
                    quantidadeVenda: vm.quantidadeVenda,
                    totalVenda: vm.totalVenda,
                    produtosComprados: produtosComprados
                }
                vm.dados = JSON.stringify(dados)
                return true;
            }
        },
        mounted () {
            $(document).ready(function(){
                vm.produtos = JSON.parse(@json($produtos))
                for (count = 0; count < vm.produtos.length; count++) {
                    vm.produtos[count].quantidadeVendaProduto = 0
                    vm.produtos[count].totalVendaProduto = 0
                }
            });
        }
    })

</script>
@stop
