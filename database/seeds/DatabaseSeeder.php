<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsuarioTableSeeder');
        $this->call('CategoriaTableSeeder');
        $this->call('ProdutoTableSeeder');
    }
}

class UsuarioTableSeeder extends Seeder
{
    public function run()
    {
        $senha = bcrypt('12345');

        DB::insert('INSERT INTO usuarios (login, senha, administrador, nome) VALUES (?, ?, ?, ?)',
            ['admin', $senha, '1', 'admin']);
    }
}

class CategoriaTableSeeder extends Seeder
{
    public function run()
    {
        DB::insert('INSERT INTO categorias (nome) VALUES (?)', ['bebidas']);
        DB::insert('INSERT INTO categorias (nome) VALUES (?)', ['enlatados']);
        DB::insert('INSERT INTO categorias (nome) VALUES (?)', ['hortifruti']);
    }
}

class ProdutoTableSeeder extends Seeder
{
    public function run()
    {
        DB::insert('INSERT INTO produtos (nome, valor, categoria_id) VALUES (?, ?, ?)', ['ervilha', '1.99', '2']);
        DB::insert('INSERT INTO produtos (nome, valor, categoria_id) VALUES (?, ?, ?)', ['cerveja', '2.99', '1']);
        DB::insert('INSERT INTO produtos (nome, valor, categoria_id) VALUES (?, ?, ?)', ['refrigerante', '4.99', '1']);
    }
}

