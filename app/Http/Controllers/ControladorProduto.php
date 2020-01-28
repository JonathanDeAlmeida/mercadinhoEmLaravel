<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use Validator;
use App\Produto;
use App\Categoria;


class ControladorProduto extends Controller
{
    public function criar ()
    {
        $categorias = Categoria::all();
        return view('produto/criar')->with('categorias', $categorias);
    }

    public function salvarCriacao ()
    {
        $nome = Request::input('nome');
        $valor = Request::input('valor');
        $categoriaEscolhida = Request::input('categoriaEscolhida');

        $categorias = Categoria::all();

        foreach ($categorias as $categoria) {
            if ($categoria->nome == $categoriaEscolhida) {
                $categoria_id = $categoria->id;
            }
        }

        $validator = Validator::make(
            ['nome' => $nome, 'valor' => $valor],
            ['nome' => 'required|min:6', 'valor' => 'required|numeric' ],
            ['required' => ':attribute é obrigatório',
                'numeric' => ':attribute deve ser um número',
                'min' => ':attribute deve ter no mínimo 6 letras'
            ]);

        if ($validator->fails()) {
            return redirect()->action('ControladorProduto@criar')->withErrors($validator)->withInput();
        }

        $produto = new Produto();
        $produto->nome = $nome;
        $produto->valor = $valor;
        $produto->categoria_id = $categoria_id;
        $produto->save();

        return redirect()->action('ControladorProduto@listar')->withInput();
    }

    public function listar ()
    {

        $produtos = DB::table('produtos')
            ->join('categorias', 'produtos.categoria_id', '=', 'categorias.id')
            ->select('produtos.id', 'produtos.nome', 'produtos.valor', 'categorias.nome as nomeCategoria')
            ->get();

        return view('produto/listar')->with('produtos', $produtos);
    }

    public function deletar ($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->action('ControladorProduto@listar');
    }

    public function editar ($id)
    {
        $produto = Produto::find($id);
        $categorias = Categoria::all();

        return view('produto/editar')->with('produto', $produto)->with('categorias', $categorias);
    }

    public function salvarEdicao ($id)
    {
        $nome = Request::input('nome');
        $valor = Request::input('valor');
        $categoriaEscolhida = Request::input('categoriaEscolhida');

        $categorias = Categoria::all();

        foreach ($categorias as $categoria) {
            if ($categoria->nome == $categoriaEscolhida) {
                $categoria_id = $categoria->id;
            }
        }

        $validator = Validator::make(
            ['nome' => $nome, 'valor' => $valor],
            ['nome' => 'required|min:6', 'valor' => 'required|numeric' ],
            ['required' => ':attribute é obrigatório',
                'numeric' => ':attribute deve ser um número',
                'min' => ':attribute deve ter no mínimo 6 letras'
            ]);

        if ($validator->fails()) {
            return redirect()->action('ControladorProduto@editar', $id)->withErrors($validator)->withInput();
        }

        $produto = Produto::find($id);
        $produto->nome = $nome;
        $produto->valor = $valor;
        $produto->categoria_id = $categoria_id;
        $produto->save();

        return redirect()->action('ControladorProduto@listar')->withInput();
    }
}
