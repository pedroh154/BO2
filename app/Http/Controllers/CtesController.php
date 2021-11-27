<?php

namespace App\Http\Controllers;
use App\Models\Cte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cidade;

class CtesController extends Controller
{
    private $objCte;

    public function __construct()
    {
        $this->objCte = new Cte();
    }

    /* VIEWS */
    public function index(){
        return view('ctes.index');
    }

    public function novoCte(){
        $cidade = new Cidade();
        $listCidades = $cidade->all();
        return view('ctes.criarcte')->with('listCidades', $listCidades);
    }

    public function detalhesCte(){
        return view('ctes.detalhescte')/*->with($data)*/;
    }

    /* CRUD */
    public function manter(Request $request)
    {
        $this->objCte->numero_nf = $request->numero_nf;
        $this->objCte->valor_cte = $request->valor_cte;
        $this->objCte->volume = $request->volume;
        $this->objCte->obs = $request->obs;
        $this->objCte->data_chegada = $request->data_chegada;
        $this->objCte->numero_cte = $request->numero_cte;
        $this->objCte->data_entrega = $request->data_entrega;
        $this->objCte->tipo_pagamento = $request->tipo_pagamento;
        $this->objCte->valor_nf = $request->valor_nf;
        $this->objCte->remetente_id = $request->remetente_id;
        $this->objCte->destinatario_id = $request->destinatario_id;
        $this->objCte->user_id = auth()->id();

        $this->objCte->save();

        return redirect()->back();
    }
}
