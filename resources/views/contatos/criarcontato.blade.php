@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<!--<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->

<!--{{$variavel}}-->

<div id="content-wrapper" class="d-flex flex-column">
    <h1 class="container-fluid">Cadastrar contato</h1>

    <h4 class="container-fluid">Forneça os dados abaixo:</h4>     <br>
    <form class="container-fluid" action="/contatos" method="POST">
        <div class="mb-3">
            <!--VER IDS-->
            <label for="nomecontato" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nomecontato" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="telefonecontato" class="form-label">Telefone</label>
            <input type="number" class="form-control" id="telefonecontato">
        </div>
        <div class="mb-3">
            <label for="enderecocontato" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="enderecocontato" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="descricaocontato" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricaocontato" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" id="" href="/contatos" >Cadastrar</button>
    </form>
</div>





<footer class="container">
    <!--<a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
</footer>
@endsection('content')