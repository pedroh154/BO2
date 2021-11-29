<?php

namespace App\Http\Controllers;
use App\Models\Cte;
use App\Models\Cliente;
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

        $listClientes = Cliente::where('user_id', auth()->id())->orderBy('nome')->get();

        return view('ctes.criarcte', compact('listCidades', 'listClientes'));
    }

    public function detalhesCte(){
        $listCtes = Cte::where('user_id', auth()->id())->orderBy('data_chegada')->get();

        return view('ctes.detalhescte', compact('listCtes'));
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
        $this->objCte->cidade_remetente_id = $request->cidade_remetente_id;
        $this->objCte->cidade_destinataria_id = $request->cidade_destinataria_id;
        $this->objCte->user_id = auth()->id();

        $this->objCte->save();

        return redirect()->back();
    }
}
