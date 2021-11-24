@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<!--<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">Cadastrar cliente</h1>

    <h4 class="container-fluid">Forneça os dados abaixo:</h4>     <br>
    <form class="container-fluid" action="/cliente-enviar" method="POST">
        @csrf
        <div class="mb-3">
            <!--VER IDS-->
            <label for="nomecontato" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" required name="nome" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="telefonecontato" class="form-label">Telefone</label>
            <input type="number" class="form-control" id="fone" required name="fone">
        </div>
        <div class="mb-3">
            <label for="enderecocontato" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="descricaocontato" class="form-label">Descrição</label>
            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>





<footer class="container">
    <!--<a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
</footer>
@endsection('content')