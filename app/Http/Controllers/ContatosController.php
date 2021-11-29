<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use Illuminate\Support\Facades\Auth;

class ContatosController extends Controller
{
    private $objContato;

    public function __construct()
    {
        $this->objContato = new Contato();
    }

    /* views */
    public function index()
    {
        $listContatos = Contato::where('user_id', auth()->id())->orderBy('nome')->get();
        return view('contatos.index', compact('listContatos'));
    }

    public function novoContato()
    {
        return view('contatos.criarcontato');
    }

    public function detalhesContato()
    {
        return view('contatos.detalhescontato');
    }

    public function editarContato()
    {
        return view('contatos.editarcontato');
    }

    /* CRUD */
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
