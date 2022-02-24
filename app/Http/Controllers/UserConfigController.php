<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesRequest;
use App\Models\Cliente;
use App\Models\Cidade;

class UserConfigController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('config.index');
    }

    public function alterarsenha()
    {
        return view('config.alterarsenha');
    }

    public function alterarssw()
    {
        return view('config.alterarssw');
    }
    
}
