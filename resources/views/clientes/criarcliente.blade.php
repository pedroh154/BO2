@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<!--<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">Cadastrar cliente</h1>

    @if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
            {{$erro}}<br>
        @endforeach
    </div>
    @endif

    <h4 class="container-fluid">Forneça os dados abaixo:</h4> <br>
    <div class="container-fluid">
        <form class="row g-3" action="/cliente-enviar" method="POST" autocomplete="off">
            @csrf
            <div class="col-md-7">
                <!--VER IDS-->
                <label for="nomecliente" class="form-label">Nome Completo</label>
                <input type="text" maxlength="200" class="form-control" id="nome" required name="nome">
            </div>
            <div class="col-md-3">
                <label for="fonecliente" class="form-label">Telefone</label>
                <input type="text" maxlength="15" class="form-control" id="fone" name="fone" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
            </div>
            <div class="col-md-2">
                <label for="cepcliente" class="form-label">CEP</label>
                <input type="text" maxlength="8" class="form-control" id="cep" required name="cep" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
            </div>
            <div class="col-md-5">
                <label for="enderecocliente" class="form-label">Endereço</label>
                <input type="text" maxlength="150" class="form-control" id="endereco" required name="endereco">
            </div>
            <div class="col-md-3">
                <label for="cadastronacionalcliente" class="form-label">CPF/CNPJ</label>
                <input type="text" class="form-control" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" maxlength="14" id="cadastro_nacional" required name="cadastro_nacional">
            </div>
            <div class="col-md-4">
                    <label for="a" class="form-label">Cidade</label>
                    <select id="cidade_id" required name="cidade_id" class="selectpicker" data-live-search="true">
                        @foreach ($listCidades as $cidade)
                            <option name="field" value={{$cidade->id}}>{{ $cidade->name }} - {{$cidade->estado_id}} </option>
                        @endforeach
                    </select>
            </div>

            <div class="mb-3">
                <label for="obscliente" class="form-label">Observações</label>
                <textarea class="form-control" maxlength="280" id="obs" name="obs" rows="2"></textarea>
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