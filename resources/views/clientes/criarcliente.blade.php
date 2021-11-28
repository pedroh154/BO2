@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<!--<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">Cadastrar cliente</h1>

    <h4 class="container-fluid">Forneça os dados abaixo:</h4> <br>
    <div class="container-fluid">
        <form class="row g-3" action="/cliente-enviar" method="POST">
            @csrf
            <div class="col-md-7">
                <!--VER IDS-->
                <label for="nomecliente" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" required name="nome">
            </div>
            <div class="col-md-3">
                <label for="fonecliente" class="form-label">Telefone</label>
                <input type="number" class="form-control" id="fone" required name="fone">
            </div>
            <div class="col-md-2">
                <label for="cepcliente" class="form-label">CEP</label>
                <input type="number" class="form-control" id="cep" required name="cep">
            </div>
            <div class="col-md-5">
                <label for="enderecocliente" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco">
            </div>
            <div class="col-md-3">
                <label for="cadastronacionalcliente" class="form-label">CPF/CNPJ</label>
                <input type="number" class="form-control" id="cadastro_nacional" name="cadastro_nacional">
            </div>
            <div class="col-md-4">
                <label for="cidadesr" class="form-label">Cidade</label>
                <input id="cidade_id" name="cidade_id" class="form-control" list="listcidades" placeholder="Digite para pesquisar...">
                <datalist id="listcidades">
                    @foreach ($listCidades as $cidade)
                    <option value="{{ $cidade->id }}" hidden> {!! $cidade->name !!} </option>
                    @endforeach
                </datalist>
            </div>

            <div class="mb-3">
                <label for="obscliente" class="form-label">Observações</label>
                <textarea class="form-control" id="obs" name="obs" rows="2"></textarea>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
</div>






<footer class="container">
    <!--<a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
</footer>
@endsection('content')