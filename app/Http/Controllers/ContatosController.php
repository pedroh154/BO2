<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contato;
use Illuminate\Support\Facades\Auth;

class ContatosController extends Controller
{
    protected $listContatos;

    /* buscar dados pra tabela no view */
    public function getContatosList(){
        return $tableContent = Contato::where('user_id', Auth::id())->orderBy('nome')->get();
    }

    /* views */
    public function index(){
        $listContatos = $this->getContatosList();
        return view('contatos.index')->with('listContatos', $listContatos);
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
