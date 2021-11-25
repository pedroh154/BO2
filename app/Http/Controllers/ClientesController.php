<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    public function novoCliente(){
        return view('clientes.criarcliente')->with('listCidades', $this->getCidadesList());
    }

    public function novoClientePop(){
        return view('layouts.criarclientepop')->with('listCidades', $this->getCidadesList());
    }

        /* buscar dados pra tabela no view */
        public function getCidadesList(){
            $cidades = DB::select('SELECT c.name FROM cidades AS c');
            return $cidades;
        }

    /* CRUD */
    public function manter(Request $request)
    {
        $cliente = new Cliente;
        $cliente->fone = $request->fone;
        $cliente->nome = $request->nome;
        $cliente->obs = $request->obs;
        $cliente->endereco = $request->endereco;
        $cliente->cep = $request->cep;
        $cliente->cadastro_nacional = $request->cadastro_nacional;
        $cliente->save();
        return redirect()->back();
    }
}
