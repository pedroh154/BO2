<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesRequest;
use App\Models\Cliente;
use App\Models\Cidade;

class ClientesController extends Controller
{
    private $objCliente;

    public function __construct()
    {
        $this->objCliente = new Cliente();
    }

    /* VIEWS */
    public function index()
    {
        $listClientes = Cliente::where('user_id', auth()->id())->orderBy('nome')->get();
        return view('clientes.index', compact('listClientes'));
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

    public function detalhesCliente($cliente, bool $editavel)
    {
        $listCidades = Cidade::all();

        return view('clientes.detalhescliente', compact('cliente', 'listCidades', 'editavel'));
    }

    /* CRUD */
    public function manter(ClientesRequest $request)
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

        return redirect('/clientes')->withInput()->withMessage('Cliente cadastrado com sucesso!');
    }

    //visualizar
    public function show($id)
    {
        return $this->detalhesCliente($this->objCliente->find($id), false);
    }

    //editar   
    public function edit($id)
    {
        return $this->detalhesCliente($this->objCliente->find($id), true);
    }

    //update   
    public function update(ClientesRequest $request, $id)
    {
        $this->objCliente->where('id', $id)->update([
            'nome' => $request->nome,
            'cep' => $request->cep,
            'endereco' => $request->endereco,
            'cadastro_nacional' => $request->cadastro_nacional,
            'fone' => $request->fone,
            'obs' => $request->obs,
        ]);

        return redirect('/clientes')->withInput()->withMessage('Cliente editado com sucesso!');
    }
}
