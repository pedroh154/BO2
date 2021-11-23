<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Despesa;

class DespesasController extends Controller
{
    /* VIEWS */
    public function index(){
        return view('despesas.index');
    }

    public function novaDespesa(){
        return view('despesas.criardespesa');
    }
    
    /* CRUD */
    public function manter(Request $request)
    {
        $despesa = new Despesa();
        $despesa->categoria = $request->categoria;
        $despesa->data = $request->data;
        $despesa->valor = $request->valor;
        $despesa->desc = $request->desc;
        $despesa->user_id = auth()->id();
        $despesa->save();
    }
}
