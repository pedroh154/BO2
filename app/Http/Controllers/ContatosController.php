<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contato;

class ContatosController extends Controller
{
    /* views */
    public function index(){
        $data = ['jeferso maguila', 'joao marcos', 'faustao', 'casimiro twitch', 'cellbit'];
        return view('contatos.index')->with('data', $data);
    }

    public function novoContato(){
       
        return view('contatos.criarcontato');
    }

    /* CRUD */
    public function manter(Request $request)
    {
        $contato = new Contato;
        $contato->fone = $request->fone;
        $contato->nome = $request->nome;
        $contato->desc = $request->desc;
        $contato->endereco = $request->endereco;
        $contato->user_id = auth()->id();
        $contato->save();
        return redirect()->back();
    }

    /*public function alterar(Request $request)
    {
    }*/

    /*public function excluir(Request $request)
    {
    }*/
}
