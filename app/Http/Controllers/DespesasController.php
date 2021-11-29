<?php

namespace App\Http\Controllers;

use App\Http\Requests\DespesasRequest;
use App\Models\Despesa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DespesasController extends Controller
{
    private $objDespesa;

    public function __construct()
    {
        $this->objDespesa = new Despesa();
    }

    /* VIEWS */
    public function index()
    {
        $listDespesas = Despesa::where('user_id', auth()->id())->orderBy('categoria')->get();
        return view('despesas.index', compact('listDespesas'));
    }

    public function novaDespesa()
    {
        return view('despesas.criardespesa');
    }

    public function editarDespesa()
    {
        return view('despesas.editardespesa');
    }

    public function detalhesDespesa()
    {
        return view('despesas.detalhesdespesa');
    }

    /* CRUD */
    public function manter(DespesasRequest $request)
    {
        $this->objDespesa->categoria = $request->categoria;
        $this->objDespesa->data = $request->data;
        $this->objDespesa->valor = $request->valor;
        $this->objDespesa->desc = $request->desc;
        $this->objDespesa->user_id = auth()->id();

        $this->objDespesa->save();

        return redirect()->back();
    }
}
