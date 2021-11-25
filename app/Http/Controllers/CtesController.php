<?php

namespace App\Http\Controllers;
use App\Models\Cidade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CtesController extends Controller
{
    /* buscar dados pra tabela no view */
    public function getCidadesList(){
        $cidades = DB::select('SELECT c.name FROM cidades AS c');
        return $cidades;
    }

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
}
