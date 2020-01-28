<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use Validator;
use App\Usuario;



class ControladorAdministrador
{
    public function entrar ()
    {
        return view('administrador/administrador');
    }
}
