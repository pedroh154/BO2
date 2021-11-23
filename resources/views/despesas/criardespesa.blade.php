@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<!--<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->

<!--{{$variavel}}-->

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">Cadastrar despesa</h1>

    <h4 class="container-fluid">Forneça os dados abaixo:</h4> <br>
    <form class="container-fluid" action="/contato-enviar" method="POST">
        @csrf
        <div class="input-group mb-3">
            <!--VER IDS-->
            <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
            <select class="form-select" id="inputGroupSelect01">
                <option value="1" selected>Aluguel</option>
                <option value="2">Luz</option>
                <option value="3">Água</option>
                <option value="3">Manutenção</option>
                <option value="3" >Outros</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="valordespesa" class="form-label">Data</label>
            <input type="date" class="form-control" id="valordespesa" name="fone">
        </div>
        <div class="mb-3">
            <label for="valordespesa" class="form-label">Valor</label>
            <input type="number" class="form-control" id="valordespesa" placeholder="R$" name="fone">
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