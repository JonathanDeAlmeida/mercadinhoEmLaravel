<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//USUARIO

Route::get('/login', 'ControladorUsuario@login');
Route::post('/login/logar', 'ControladorUsuario@logar');

Route::get('/cadastro', 'ControladorUsuario@cadastro');
Route::post('/cadastro/cadastrar', 'ControladorUsuario@cadastrar');

// CATEGORIA

Route::get('/categoria/listar', 'ControladorCategoria@listar');

Route::get('/categoria/criar', 'ControladorCategoria@criar');
Route::post('/categoria/salvarCriacao', 'ControladorCategoria@salvarCriacao');

Route::get('/categoria/editar/{id?}', 'ControladorCategoria@editar');
Route::post('/categoria/salvarEdicao/{id?}', 'ControladorCategoria@salvarEdicao');

Route::get('/categoria/deletar/{id?}', 'ControladorCategoria@deletar');


// PRODUTO

Route::get('/produto/listar', 'ControladorProduto@listar');

Route::get('/produto/criar', 'ControladorProduto@criar');
Route::post('/produto/salvarCriacao', 'ControladorProduto@salvarCriacao');

Route::get('/produto/editar/{id?}', 'ControladorProduto@editar');
Route::post('/produto/salvarEdicao/{id?}', 'ControladorProduto@salvarEdicao');

Route::get('/produto/deletar/{id?}', 'ControladorProduto@deletar');


// VENDA

Route::get('/venda/', 'ControladorVenda@listar');
Route::post('/venda/finalizar', 'ControladorVenda@finalizar');

// ADMINISTRADOR

Route::get('/administrador/', 'ControladorAdministrador@entrar');

