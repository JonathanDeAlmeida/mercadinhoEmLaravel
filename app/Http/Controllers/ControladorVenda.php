<?php

namespace App\Http\Controllers;
use App\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Request;
use Validator;
use App\Produto;
use App\Venda;
use App\VendaProduto;


class ControladorVenda extends Controller
{
    public function listar ()
    {
        $id = Session::get('id');
        $usuario = Usuario::find($id);

        if ($usuario['administrador']) {
            $administrador = true;
        } else {
            $administrador = false;
        }

        $produto = Produto::all();
        $produtos = json_encode($produto);

        return view('venda/venda')->with('produtos', $produtos)->with('administrador', $administrador);
    }

    public function finalizar ()
    {
        $dados = json_decode(Request::input('dados'));

        $quantidadeVenda = $dados->quantidadeVenda;
        $totalVenda = $dados->totalVenda;
        $produtos = $dados->produtosComprados;

        $vendas = new Venda();
        $vendas->quantidade = $quantidadeVenda;
        $vendas->valor = $totalVenda;
        $vendas->save();

        foreach ($produtos as $produto) {

            $vendaProduto = new VendaProduto();
            $vendaProduto->quantidade = $produto->quantidadeVendaProduto;
            $vendaProduto->valorProdutoAtual = $produto->valor;
            $vendaProduto->total = $produto->totalVendaProduto;
            $vendaProduto->produto_id = $produto->id;
            $vendaProduto->venda_id = $vendas->id;
            $vendaProduto->save();

        }

        $id = Session::get('id');
        $usuario = Usuario::find($id);

        if ($usuario['administrador']) {
            $administrador = true;
        } else {
            $administrador = false;
        }

        $produto = Produto::all();
        $produtos = json_encode($produto);

        return view('venda/venda')
            ->with('produtos', $produtos)->with('administrador', $administrador)
            ->with('finalizada', true)->with('totalVenda', $totalVenda);
    }
}
