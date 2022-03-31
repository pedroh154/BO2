<?php

namespace App\Http\Controllers;

use App\Http\Requests\DespesasRequest;
use App\Models\Despesa;
use Illuminate\Http\Request;

class DespesasController extends Controller
{
    /* obj mestre para CRUD */
    private $objDespesa;

    /* lista com possíveis categorias de despesa (usado pelo detalhesDespesa) */
    private $categorias = [
        'Aluguel',
        'Luz',
        'Água',
        'Manutenção',
        'Outros',
    ];

    public function __construct()
    {
        $this->objDespesa = new Despesa();
    }

    /* VIEWS */
    public function index()
    {
        $listDespesas = Despesa::where('user_id', auth()->id())->sortable()->paginate(2);
        return view('despesas.index', compact('listDespesas'));
    }

    public function novaDespesa()
    {
        return view('despesas.criardespesa');
    }

    public function detalhesDespesa($despesa, bool $editavel)
    {
        $listCategorias = $this->categorias;
        return view('despesas.detalhesdespesa', compact('despesa', 'editavel', 'listCategorias'));
    }

    public function editarDespesa()
    {
        return view('despesas.editardespesa');
    }

    /* CRUD */
    //visualizar
    public function show($id)
    {
        return $this->detalhesDespesa($this->objDespesa->find($id), false);
    }

    //inserir
    public function manter(DespesasRequest $request)
    {
        $this->objDespesa->categoria = $request->categoria;
        $this->objDespesa->data = $request->data;
        $this->objDespesa->valor = $request->valor;
        $this->objDespesa->desc = $request->desc;
        $this->objDespesa->user_id = auth()->id();

        $this->objDespesa->save();

        return redirect('/despesas')->withInput()->withMessage('Despesa cadastrada com sucesso!');
    }

    //editar   
    public function edit($id)
    {
        return $this->detalhesDespesa($this->objDespesa->find($id), true);
    }

    //update   
    public function update(DespesasRequest $request, $id)
    {
        $this->objDespesa->find($id)->update([
            'categoria' => $request->categoria,
            'data' => $request->data,
            'valor' => $request->valor,
            'desc' => $request->desc,
        ]);

        return redirect('/despesas')->withInput()->withMessage('Despesa editada com sucesso!');
    }

    //destroy   
    public function destroy($id)
    {
        $this->objDespesa->destroy($id);

        return redirect('/despesas')->withInput()->withMessage('Despesa deletada com sucesso!');
    }

    //destroy   
    public function search(Request $request)
    {
        $listDespesas = Despesa::where('user_id', auth()->id());

        if ($request->has('categoria'))
        {
            $listDespesas->where('categoria', 'LIKE', $request->input('categoria'));
        }

        // if ($request->has('search'))
        // {
        //     $listDespesas->where(function ($q) use ($request)
        //     {
        //         return $q->where('desc', 'LIKE', $request->input('search') . '%');
        //     });
        // }

        //$listDespesas->paginate(15);
        $filters = $request->all();

        return view('despesas.index', compact('listDespesas', 'filters'));
    }
}
