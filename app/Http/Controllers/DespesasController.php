<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DespesasController extends Controller
{
    public function index(){
        return view('despesas.index');
    }

    public function novaDespesa(){
        $title = 'Criar despesa';
        return view('despesas.criardespesa')->with('variavel', $title);
    }
    
}
