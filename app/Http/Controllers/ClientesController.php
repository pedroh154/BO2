<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    private $objCliente;

    public function __construct()
    {
        $this->objCliente = new Cliente();
    }

    public function novoCliente(){
        $cidade = new Cidade();
        $listCidades = $cidade->all();
        return view('clientes.criarcliente', compact('listCidades'));
    }

    public function novoClientePop(){
        $cidade = new Cidade();
        $listCidades = $cidade->all();
        return view('layouts.criarclientepop', compact('listCidades'));
    }

    /* CRUD */
    public function manter(Request $request)
    {
        $this->objCliente->fone = $request->fone;
        $this->objCliente->nome = $request->nome;
        $this->objCliente->obs = $request->obs;
        $this->objCliente->endereco = $request->endereco;
        $this->objCliente->cep = $request->cep;
        $this->objCliente->cadastro_nacional = $request->cadastro_nacional;
        $this->objCliente->cidade_id = $request->cidade_id;
        $this->objCliente->user_id = auth()->id();

        $this->objCliente->save();

        return redirect()->back();
    }
}
