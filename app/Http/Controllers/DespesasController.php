<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Despesa;
use Illuminate\Support\Facades\Auth;

class DespesasController extends Controller
{
    /* buscar dados pra tabela no view */
    public function getDespesasList(){
		return $tableContent = Despesa::where('user_id', Auth::id())->orderBy('valor')->get();
    }

    /* VIEWS */
    public function index(){
        $listDespesas = $this->getDespesasList();
        return view('despesas.index')->with('listDespesas', $listDespesas);
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
