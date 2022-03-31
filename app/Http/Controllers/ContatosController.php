<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatosRequest;
use App\Models\Contato;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    private $objContato;

    public function __construct()
    {
        $this->objContato = new Contato();
    }

    /* VIEWS */
    public function index()
    {
        $listContatos = Contato::where('user_id', auth()->id())->sortable()->paginate(15);
        return view('contatos.index', compact('listContatos'));
    }

    public function novoContato()
    {
        return view('contatos.criarcontato');
    }

    public function detalhesContato($contato, bool $editavel)
    {
        return view('contatos.detalhescontato', compact('contato', 'editavel'));
    }

    public function editarContato($contato)
    {
        return view('contatos.editarcontato', compact('contato'));
    }

    /* CRUD */
    //visualizar
    public function show($id)
    {
        return $this->detalhesContato($this->objContato->find($id), false);
    }

    //inserir
    public function manter(ContatosRequest $request)
    {
        $this->objContato->fone = $request->fone;
        $this->objContato->nome = $request->nome;
        $this->objContato->desc = $request->desc;
        $this->objContato->endereco = $request->endereco;
        $this->objContato->user_id = auth()->id();

        $this->objContato->save();

        return redirect('/contatos')->withInput()->withMessage('Contato cadastrado com sucesso!');
    }

    //editar   
    public function edit($id)
    {
        return $this->detalhesContato($this->objContato->find($id), true);
    }

    //update   
    public function update(ContatosRequest $request, $id)
    {
        $this->objContato->where('id', $id)->update([
            'fone' => $request->fone,
            'nome' => $request->nome,
            'desc' => $request->desc,
            'endereco' => $request->endereco,
        ]);

        return redirect('/contatos')->withInput()->withMessage('Contato editado com sucesso!');
    }

    //destroy   
    public function destroy($id)
    {
        $this->objContato->destroy($id);

        return redirect('/contatos')->withInput()->withMessage('Contato deletado com sucesso!');
    }

    //destroy   
    public function search(Request $request)
    {
        $listContatos = Contato::where('nome', 'LIKE', "%{$request->search}%")->orWhere('fone', 'LIKE', "%{$request->search}%")->paginate(15);
        $filters = $request->all();
        //dd($request->search); die;
        return view('contatos.index', compact('listContatos', 'filters'));
        //return redirect('/contatos')->withInput()->withMessage('contato deletado com sucesso!');
    }
}
