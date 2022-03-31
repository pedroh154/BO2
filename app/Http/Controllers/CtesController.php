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
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class CtesController extends Controller
{
    private $objCte;

    private $tiposDePagamento = [
        'CIF',
        'FOB',
    ];

    private $situacao = [
        'ABERTO',
        'CONCLUÍDO',
    ];

    public function __construct()
    {
        $this->objCte = new Cte();
    }

    /* VIEWS */
    public function index()
    {
        $listCtes = Cte::where('user_id', auth()->id())->sortable()->paginate(15);

        $date = Carbon::now();

        return view('ctes.index', compact('listCtes', 'date'));
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

        //$cidade = DB::table('cidades')->select('*');
        //$cidade->where('id','=',1100015);

        //dd($cidade->paginate(15)); die;

        $listCidades = $cidade->all();
        $listClientes = Cliente::where('user_id', auth()->id())->orderBy('nome')->get();
        $listTiposDePagamento = $this->tiposDePagamento;
        $situacao = $this->situacao;

        $transp = new Transportadora();
        $listTransp = $transp->all();

        $cidade_rem_nome = Cidade::where('id', $cte->cidade_remetente_id)->first();
        $cidade_dest_nome = Cidade::where('id', $cte->cidade_destinataria_id)->first();

        $cliente_rem_nome = Cliente::where('id', $cte->remetente_id)->first();
        $cliente_dest_nome = Cliente::where('id', $cte->destinatario_id)->first();
        
        return view('ctes.detalhescte', compact('cte', 'listTransp', 'listCidades', 'listClientes', 'listTiposDePagamento', 'situacao',
                                                'cidade_dest_nome', 'cidade_rem_nome', 'cliente_rem_nome', 'cliente_dest_nome'));
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
        $this->objCte->finalizado = 'ABERTO';
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
            'transportadora_id' => $request->transportadora_id,
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
            'finalizado' => $request->finalizado,
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

    public function getCidades(Request $request)
    {

        $listCidades = array();
        $search = $request->search;

        if ($search != "") {
            $listCidades = Cidade::orderBy('name', 'asc')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
        } else {
            $listCidades = Cidade::orderBy('name')->limit(5)->get();
        }

        $response = array();

        foreach ($listCidades as $cidade) {

            $estado = Estado::where('id', $cidade->estado_id)->first();

            $response[] = array(
                "id" => $cidade->id,
                "text" => $cidade->name . ' - ' . $estado->abbr
            );
        }
        return response()->json($response);
    }

    //destroy   
    public function search(Request $request)
    {
        $listCtes = Cte::where('user_id', auth()->id());

        if ($request->has('empresa') && $request->empresa != 'Todas') {
            $listCtes->where('transportadora_id', 'LIKE', $request->empresa);
        }

        if ($request->has('pagamento') && $request->pagamento != 'Ambos') {
            $listCtes->where('tipo_pagamento', 'LIKE', $request->pagamento);
        }

        if ($request->has('situacao') && $request->situacao != 'TODOS') {
            $listCtes->where('finalizado', 'LIKE', $request->situacao);
        }

        $filters = $request->all();
        $listCtes = $listCtes->paginate(15);

        return view('ctes.index', compact('listCtes', 'filters'));
    }
}
