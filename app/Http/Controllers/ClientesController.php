<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesRequest;
use App\Models\Cliente; 
use App\Models\Contato;
use App\Models\Cidade;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public $objCliente;

    public function __construct()
    {
        $this->objCliente = new Cliente();
    }

    /* VIEWS */
    public function index()
    {
        $listClientes = Cliente::where('user_id', auth()->id())->orderBy('nome')->paginate(15);
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

        if(Contato::where('fone', $this->objCliente->fone)->first() == null){
            $objContato = new Contato();
            $objContato->fone = $this->objCliente->fone;
            $objContato->nome = $this->objCliente->nome;
            $objContato->desc = $this->objCliente->obs;
            $objContato->endereco = $this->objCliente->endereco;
            $objContato->user_id = auth()->id();
            $objContato->save();
        }

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

    //destroy   
    public function destroy($id)
    {
        $this->objCliente->destroy($id);

        return redirect('/clientes')->withInput()->withMessage('Cliente deletado com sucesso!');
    }

    public function getClientes(Request $request){

        $listClientes = Cliente::where('user_id', auth()->id())->orderBy('nome')->get();
        
        $response = array();

        foreach($listClientes as $cliente){
            $response[] = array(
                    "id"=>$cliente->id,
                    "text"=>$cliente->nome
            );
        }
        return response()->json($response);  
    }

    //destroy   
    public function search(Request $request)
    {
        $listClientes = Cliente::where('nome', 'LIKE', "%{$request->search}%")
        ->orWhere('fone', 'LIKE', "%{$request->search}%")
        ->orWhere('endereco', 'LIKE', "%{$request->search}%")
        ->paginate(15);
        $filters = $request->all();
        //dd($request->search); die;
        return view('clientes.index', compact('listClientes', 'filters'));
        //return redirect('/contatos')->withInput()->withMessage('contato deletado com sucesso!');
    }
}
