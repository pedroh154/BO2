<?php

namespace App\Http\Controllers;

use App\Models\Cte;
use App\Models\Cliente;
use App\Models\Cidade;
use App\Http\Requests\CtesRequest;
use Illuminate\Support\Facades\Log;


class CtesController extends Controller
{
    private $objCte;

    private $tiposDePagamento = [
        'CIF',
        'FOB',
    ];

    public function __construct()
    {
        $this->objCte = new Cte();
    }

    /* VIEWS */
    public function index()
    {
        $listCtes = Cte::where('user_id', auth()->id())->orderBy('data_chegada')->get();
        return view('ctes.index', compact('listCtes'));
    }

    public function novoCte()
    {
        $cidade = new Cidade();
        $listCidades = $cidade->all();

        $listClientes = Cliente::where('user_id', auth()->id())->orderBy('nome')->get();

        return view('ctes.criarcte', compact('listCidades', 'listClientes'));
    }

    public function detalhesCte($cte, bool $editavel)
    {
        $cidade = new Cidade();
        $listCidades = $cidade->all();

        $listClientes = Cliente::where('user_id', auth()->id())->orderBy('nome')->get();

        $listTiposDePagamento = $this->tiposDePagamento;

        return view('ctes.detalhescte', compact('cte', 'editavel', 'listCidades', 'listClientes', 'listTiposDePagamento'));
    }

    public function editarCte()
    {
        $cidade = new Cidade();
        $listCidades = $cidade->all();

        $listClientes = Cliente::where('user_id', auth()->id())->orderBy('nome')->get();

        return view('ctes.editarcte', compact('listCidades', 'listClientes'));
    }


    /* CRUD */
    //visualizar
    public function show($id)
    {

        return $this->detalhesCte($this->objCte->find($id), false);
    }

    public function manter(CtesRequest $request)
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
        $this->objCte->pode_alterar = true;
        $this->objCte->finalizado = false;
        $this->objCte->remetente_id = $request->remetente_id;
        $this->objCte->destinatario_id = $request->destinatario_id;
        $this->objCte->cidade_remetente_id = $request->cidade_remetente_id;
        $this->objCte->cidade_destinataria_id = $request->cidade_destinataria_id;
        $this->objCte->user_id = auth()->id();

        $this->objCte->save();

        return redirect()->back();
    }

    //editar   
    public function edit($id)
    {
        return $this->detalhesCte($this->objCte->find($id), true);
    }
    
    //update   
    public function update(CtesRequest $request, $id)
    {

        $this->objCte->find($id)->update([
            'numero_nf' => $request->numero_nf,
            'valor_cte' => $request->valor_cte,
            'volume' => $request->volume,
            'obs' => $request->obs,
            'data_chegada' => $request->data_chegada,
            'numero_cte' => $request->numero_cte,
            'data_entrega' => $request->data_entrega,
            'tipo_pagamento' => $request->tipo_pagamento,
            'valor_nf' => $request->valor_nf,
            'remetente_id' => $request->remetente_id,
            'destinatario_id' => $request->destinatario_id,
            'cidade_remetente_id' => $request->cidade_remetente_id,
            'cidade_destinataria_id' => $request->cidade_destinataria_id,
        ]);
    }
}
