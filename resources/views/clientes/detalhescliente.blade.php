@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">Editar cliente</h1>

    @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $erro)
                {{$erro}}<br>
            @endforeach
        </div>
    @endif
    <div class="container-fluid">
        <form class="row g-3" action="{{"/clientes/atualizar/$cliente->id"}}">
            @method('PUT')
            @csrf
            <div class="col-md-7">
                <label for="nomecliente" class="form-label">Nome Completo</label>
                <input value="{{$cliente->nome}}" type="text" maxlength="200" class="form-control" id="nome" required name="nome">
            </div>
            <div class="col-md-3">
                <label for="fonecliente" class="form-label">Telefone</label>
                <input value="{{$cliente->fone}}" type="text" maxlength="15" class="fone form-control" id="fone" name="fone" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
            </div>
            <div class="col-md-2">
                <label for="cepcliente" class="form-label">CEP</label>
                <input value="{{$cliente->cep}}" type="text" maxlength="10" class="cep form-control" id="cep" required name="cep" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
            </div>
            <div class="col-md-5">
                <label for="enderecocliente" class="form-label">Endereço</label>
                <input value="{{$cliente->endereco}}" type="text" maxlength="150" class="form-control" id="endereco" required name="endereco">
            </div>
            <div class="col-md-3">
                <label for="cadastronacionalcliente" class="form-label">CPF/CNPJ</label>
                <input value="{{$cliente->cadastro_nacional}}" type="text" class="cadastro_nacional form-control" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" id="cadastro_nacional" required name="cadastro_nacional">
            </div>
            <div class="col-md-4">
                <label class="form-label">Cidade</label>
                <br>
                <select id="cidade_id" name="cidade_id" class="col-md-12 form-select">
                    <option value={{$cidade->id}}>{{$cidade->name}} - {{$cidade->estado->abbr}}</option>
                </select>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-secondary">Confirmar</button>
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