<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DespesasController extends Controller
{
    public function index(){
        return view('despesas.index');
    }
}
