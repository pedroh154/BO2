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

    public function login(){
        $title = 'Login';
        return view('pages.login')->with('variavel', $title);
    }


    public function register(){
        $title = 'Register';
        return view('pages.register')->with('variavel', $title);
    }

    public function forgotpassword(){
        $title = 'forgotpassword';
        return view('pages.forgotpassword')->with('variavel', $title);
    }
    
}
