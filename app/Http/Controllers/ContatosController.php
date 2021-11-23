<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contato;

class ContatosController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'contato',
            'desc' => 'crie aqui um contato',
            'contatos' => ['pedro', 'iperdedo', 'lionalius', 'joao predus']
        );
        return view('contatos.index')->with($data);
    }

    public function NovoContato(){
        $title = 'Criar contato';
        return view('contatos.criarcontato')->with('variavel', $title);
    }

    public function manter(Request $request)
    {
        $contato = new Contato;
        $contato->fone = $request->fone;
        $contato->nome = $request->nome;
        $contato->desc = $request->desc;
        $contato->endereco = $request->endereco;
        $contato->save();
    }
}
