<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'teste de variavel';
        return view('pages.index')->with('variavel', $title);
    }

    public function contato(){
        $data = array(
            'title' => 'contato',
            'desc' => 'crie aqui um contato',
            'contatos' => ['pedro', 'iperdedo', 'lionalius', 'joao predus']
        );
        return view('pages.contato')->with($data);
    }
    public function criarcontato(){
        $title = 'Criar contato';
        return view('pages.criarcontato')->with('variavel', $title);
    }

}