@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<!--<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">Detalhes contato</h1>
    @if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
        {{$erro}}<br>
        @endforeach
    </div>
    @endif

    <h4 class="container-fluid">Detalhes do contato</h4> <br>
    <form class="container-fluid" action="/contatos">
        @csrf
        <div class="mb-3">
            <!--VER IDS-->
            <label for="nomecontato" class="form-label">Nome Completo</label>
            <input disabled type="text" class="form-control" id="nome" required name="nome" aria-describedby="emailHelp" value="{{$contato->nome}}">
        </div>
        <div class="mb-3">
            <label for="telefonecontato" class="form-label">Telefone</label>
            <input disabled type="number" class="form-control" id="fone" required name="fone" value="{{$contato->fone}}">
        </div>
        <div class="mb-3">
            <label for="enderecocontato" class="form-label">Endereço</label>
            <input disabled type="text" class="form-control" id="endereco" name="endereco" aria-describedby="emailHelp" value="{{$contato->endereco}}">
        </div>
        <div class="mb-3">
            <label for="descricaocontato" class="form-label">Descrição</label>
            <textarea disabled class="form-control" id="desc" name="desc" rows="3">{{$contato->desc}}</textarea>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary">Fechar</button>
        </div>
    </form>
</div>





<footer class="container">
    <!--<a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
</footer>
@endsection('content')