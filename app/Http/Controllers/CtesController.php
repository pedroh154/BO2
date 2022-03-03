<?php

namespace App\Http\Controllers;

use App\Models\Cte;
use App\Models\Cliente;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Transportadora;
use App\Http\Requests\CtesRequest;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Input;
use Illuminate\Http\Request;


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

        $transp = new Transportadora();
        $listTransp = $transp->all();

        return view('ctes.criarcte', compact('listCidades', 'listClientes', 'listTransp'));
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
        $this->objCte->transportadora_id = $request->transportadora_id;
        $this->objCte->user_id = auth()->id();

        $this->objCte->save();

        return redirect('/ctes')->withInput()->withMessage('CT-e cadastrado com sucesso!');
    }

    public function RF_Manter($request)
    {
        print_r($request);

        // $this->objCte->numero_nf = $request->numero_nf;
        // $this->objCte->valor_cte = $request->valor_cte;
        // $this->objCte->volume = $request->volume;
        // $this->objCte->obs = $request->obs;
        // $this->objCte->data_chegada = $request->data_chegada;
        // $this->objCte->numero_cte = $request->numero_cte;
        // $this->objCte->data_entrega = $request->data_entrega;
        // $this->objCte->tipo_pagamento = $request->tipo_pagamento;
        // $this->objCte->valor_nf = $request->valor_nf;
        // $this->objCte->pode_alterar = true;
        // $this->objCte->finalizado = false;
        // $this->objCte->remetente_id = $request->remetente_id;
        // $this->objCte->destinatario_id = $request->destinatario_id;
        // $this->objCte->cidade_remetente_id = $request->cidade_remetente_id;
        // $this->objCte->cidade_destinataria_id = $request->cidade_destinataria_id;
        // $this->objCte->user_id = auth()->id();

        // $this->objCte->save();

        // return redirect('/ctes')->withInput()->withMessage('CT-e cadastrado com sucesso!');
    }

    public function RF_fetch(Request $request)
    {
        //var_dump($_POST);

        $response = Http::Post("https://api.infosimples.com/api/v2/consultas/receita-federal/cte", [
            "cte" => $request->input('chavecte'), 
            "pkcs12_cert" => "",
            "pkcs12_pass" => "",
            "token" => "blJ5RUg_X5mXVizzTboG5XVYB4iDanJGy5KHU_kc"
        ]);

        $this->RF_Manter(json_decode($response->body(), true));
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

        return redirect('/ctes')->withInput()->withMessage('CT-e editado com sucesso!');
    }

    //destroy   
    public function destroy($id)
    {
        $this->objCte->destroy($id);

        return redirect('/ctes')->withInput()->withMessage('CT-e deletado com sucesso!');
    }

    public function getCidades(Request $request){

        $listCidades = array();
        $search = $request->search;

        if($search != "") {
            $listCidades = Cidade::orderBy('name','asc')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }
        else {
            $listCidades = Cidade::orderBy('name')->get();
        }
        
        $response = array();

        foreach($listCidades as $cidade){

            $estado = Estado::where('id', $cidade->estado_id)->first();

            $response[] = array(
                    "id"=>$cidade->id,
                    "text"=>$cidade->name . ' - ' . $estado->abbr
            );

        }
        return response()->json($response);  
    }

}
