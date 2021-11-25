<?php

namespace App\Http\Controllers;
use App\Models\Cte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CtesController extends Controller
{
    public function index(){
        return view('ctes.index');
    }

    public function detalhesCte(){
        return view('ctes.detalhescte')/*->with($data)*/;
    }
    public function novoCte(){
        $listCidades = $this->getCidadesList();
        return view('ctes.criarcte')->with('listCidades', $listCidades);
    }

    /* buscar dados pra tabela no view */
    public function getCidadesList(){
        $cidades = DB::select('SELECT c.name FROM cidades AS c');
        return $cidades;
    }


    /* CRUD */
    public function manter(Request $request)
    {
        $cte = new cte;

        $cte->numero_nf = $request->numero_nf;
        $cte->valor_cte = $request->valor_cte;
        $cte->volume = $request->volume;
        $cte->obs = $request->obs;
        $cte->data_chegada = $request->data_chegada;
        $cte->numero_cte = $request->numero_cte;
        $cte->data_entrega = $request->data_entrega;
        $cte->tipo_pagamento = $request->tipo_pagamento;
        $cte->valor_nf = $request->valor_nf;

        $cte->user_id = auth()->id();
        $cte->save();

        return redirect()->back();
    }
}
