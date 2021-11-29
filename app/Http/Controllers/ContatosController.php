<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class ContatosController extends Controller
{
    private $objContato;

    public function __construct()
    {
        $this->objContato = new Contato();
    }

    /* VIEWS */
    public function index()
    {
        $listContatos = Contato::where('user_id', auth()->id())->orderBy('nome')->get();
        return view('contatos.index', compact('listContatos'));
    }

    public function novoContato()
    {
        return view('contatos.criarcontato');
    }

    public function detalhesContato($contato)
    {
        return view('contatos.detalhescontato', compact('contato'));
    }

    public function editarContato($contato)
    {
        return view('contatos.editarcontato', compact('contato'));
    }

    /* CRUD */
    //visualizar
    public function show($id)
    {
        return $this->detalhesContato($this->objContato->find($id));
    }

    //inserir
    public function manter(Request $request)
    {
        $this->objContato->fone = $request->fone;
        $this->objContato->nome = $request->nome;
        $this->objContato->desc = $request->desc;
        $this->objContato->endereco = $request->endereco;
        $this->objContato->user_id = auth()->id();

        $this->objContato->save();

        return redirect()->back();
    }
}
