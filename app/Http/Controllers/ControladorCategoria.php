<?php

namespace App\Http\Controllers;
use Request;
use Validator;
use App\Categoria;


class ControladorCategoria extends Controller
{
    public function criar ()
    {
        return view('categoria/criar');
    }

    public function salvarCriacao ()
    {
        $nome = Request::input('nome');

        $validator = Validator::make(
            ['nome' => $nome],
            ['nome' => 'required|min:6'],
            [   'required' => ':attribute é obrigatório',
                'min' => 'o :attribute deve ter no mínimo 6 letras'
            ]);

        if ($validator->fails()) {
            return redirect()->action('ControladorCategoria@criar')->withErrors($validator)->withInput();
        }

        $categoria = new Categoria();
        $categoria->nome = $nome;
        $categoria->save();

        return redirect()->action('ControladorCategoria@listar')->withInput();
    }

    public function listar ()
    {
        $categorias = Categoria::all();

        return view('categoria/listar')->with('categorias', $categorias);
    }

    public function deletar ($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect()->action('ControladorCategoria@listar');
    }

    public function editar ($id)
    {
        $categoria = Categoria::find($id);

        return view('categoria/editar')->with('categoria', $categoria);
    }

    public function salvarEdicao ($id)
    {
        $nome = Request::input('nome');

        $validator = Validator::make(
            ['nome' => $nome],
            ['nome' => 'required|min:6'],
            [   'required' => ':attribute é obrigatório',
                'min' => 'o :attribute deve ter no mínimo 6 letras'
            ]);

        if ($validator->fails()) {
            return redirect()->action('ControladorCategoria@editar', $id)->withErrors($validator)->withInput();
        }

        $categoria = Categoria::find($id);
        $categoria->nome = $nome;
        $categoria->save();

        return redirect()->action('ControladorCategoria@listar')->withInput();
    }
}
