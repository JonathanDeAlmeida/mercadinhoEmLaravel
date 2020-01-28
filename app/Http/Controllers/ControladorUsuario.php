<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Request;
use Validator;
use App\Usuario;


class ControladorUsuario extends Controller
{
    public function cadastro ()
    {
        $id = Session::get('id');
        $usuario = Usuario::find($id);

        if ($usuario['administrador']) {
            $administrador = true;
        } else {
            $administrador = false;
        }

        return view('usuario/cadastro')->with('administrador', $administrador);
    }

    public function login ()
    {
        Request::session()->forget('id');
        return view('usuario/login');
    }

    public function logar (Request $request)
    {

        $login = Request::input('login');
        $senha = Request::input('senha');

        $validator = Validator::make(
            ['login' => $login, 'senha' => $senha],
            ['login' => 'required|min:5', 'senha' => 'required|min:5'],
            ['required' => ':attribute é obrigatório',
                'min' => ':attribute deve ter no mínimo 5 caracteres'
            ]);

        if ($validator->fails()) {
            return redirect()->action('ControladorUsuario@login')->withErrors($validator)->withInput();
        }

        $usuarioCadastrado = DB::table('usuarios')
            ->select('usuarios.*')
            ->where('login', $login)
            ->get();

        if (count($usuarioCadastrado) === 0) {

            return view('usuario/login')->with('naoCadastrado', true);

        } else {

            $hash = $usuarioCadastrado[0]->senha;

            if (crypt($senha, $hash) !== $hash) {

                return view('usuario/login')->with('senhaIncorreta', true);

            } else {

                $administrador = $usuarioCadastrado[0]->administrador;
                $id = $usuarioCadastrado[0]->id;

                Session::put('id', $id);

                if ($administrador) {
                    return redirect()->action('ControladorAdministrador@entrar');
                } else {
                    return redirect()->action('ControladorVenda@listar');
                }
            }
        }
    }

    public function cadastrar ()
    {
        $nome = Request::input('nome');
        $login = Request::input('login');
        $senha = Request::input('senha');
        $admin = Request::input('admin') ? true : false;

        $validator = Validator::make(
            ['nome' => $nome, 'login' => $login, 'senha' => $senha],
            ['nome' => 'required|min:5', 'login' => 'required|min:5', 'senha' => 'required|min:5'],
            ['required' => ':attribute é obrigatório',
                'min' => ':attribute deve ter no mínimo 5 caracteres'
            ]);

        if ($validator->fails()) {
            return redirect()->action('ControladorUsuario@cadastro')->withErrors($validator)->withInput();
        }

        $usuario = new Usuario();
        $usuario->nome = $nome;
        $usuario->login = $login;
        $usuario->senha = bcrypt($senha);
        $usuario->administrador = $admin;
        $usuario->save();

        $id = Session::get('id');
        $usuario = Usuario::find($id);

        if ($usuario['administrador']) {
            $administrador = true;
        } else {
            $administrador = false;
        }

        return view('usuario/cadastro')->with('cadastrado', true)->with('administrador', $administrador);
    }

}
