<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

   // public function NovoContato(){
    //    return view()
   // }
}
