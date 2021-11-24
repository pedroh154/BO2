<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function novoCliente(){
        return view('clientes.criarcliente');
    }
    public function novoClientePop(){
        return view('layouts.criarclientepop');
    }
}
