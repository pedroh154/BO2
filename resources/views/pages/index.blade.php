@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contato" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>
<h1 style="color: #FFFFFF;">{{$variavel}}</h1>
<p style="color: #FFFFFF;">Projeto BO2 - Página principal</p>
@endsection('content')