<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CtesController extends Controller
{
    public function index(){
        return view('ctes.index');
    }

    public function detalhesCte(){
        return view('ctes.detalhesCte')/*->with($data)*/;
    }
}
