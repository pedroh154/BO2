@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">@if($editavel == false) Detalhes do cliente @else Editar cliente @endif</h1>

    @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $erro)
                {{$erro}}<br>
            @endforeach
        </div>
    @endif

    <!-- FORMULÁRIO DE DETALHES -->
    <div class="container-fluid">
        @if($editavel == false)
        <form class="row g-3" action="{{"/clientes"}}">
            @csrf
            <div class="col-md-7">
                <label for="nomecliente" class="form-label">Nome Completo</label>
                <input value="{{$cliente->nome}}" disabled type="text" maxlength="200" class="form-control" id="nome" required name="nome">
            </div>
            <div class="col-md-3">
                <label for="fonecliente" class="form-label">Telefone</label>
                <input value="{{$cliente->fone}}" disabled type="text" maxlength="15" class="form-control" id="fone" name="fone" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
            </div>
            <div class="col-md-2">
                <label for="cepcliente" class="form-label">CEP</label>
                <input value="{{$cliente->cep}}" disabled type="text" maxlength="8" class="form-control" id="cep" required name="cep" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
            </div>
            <div class="col-md-5">
                <label for="enderecocliente" class="form-label">Endereço</label>
                <input value="{{$cliente->endereco}}" disabled type="text" maxlength="150" class="form-control" id="endereco" required name="endereco">
            </div>
            <div class="col-md-3">
                <label for="cadastronacionalcliente" class="form-label">CPF/CNPJ</label>
                <input value="{{$cliente->cadastro_nacional}}" disabled type="text" class="form-control" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" maxlength="14" id="cadastro_nacional" required name="cadastro_nacional">
            </div>
            <div class="col-md-4">
                <label for="cidadesr" class="form-label">Cidade</label>
                <select class="form-select" name="cidade_id" id="cidade_id" aria-label="Example select with button addon" disabled>
                    <option selected>{{$cliente->cidade_id}}</option>
                </select>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-secondary">@if($editavel == false)Fechar @else Confirmar @endif</button>
            </div>

        </form>
    </div>

    <!-- FORMULÁRIO DE EDIT -->
    @else
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
                <label for="cidadesr" class="form-label">Cidade</label>
                <input id="cidade_id" value="{{$cliente->cidade_id}}"name="cidade_id" class="form-control" required list="listcidades" placeholder="Digite para pesquisar...">
                <datalist id="listcidades">
                    @foreach ($listCidades as $cidade)
                        <option value="{{ $cidade->id }}"> {{ $cidade->name }} </option>
                    @endforeach
                </datalist>
            </div>

            <script type='text/javascript'>
                $j=jQuery.noConflict();
                $j(document).ready(function () {

                    $j("#fone").inputmask("(99) 99999-9999", ({removeMaskOnSubmit: true}));
                    $j("#cep").inputmask("99.999-999", ({removeMaskOnSubmit: true}));

                    var options = {
                        onKeyPress: function (cpf, ev, el, op) {
                            var masks = ['000.000.000-000', '00.000.000/0000-00'];
                            $('#cadastro_nacional').inputmask((cpf.length > 14) ? masks[1] : masks[0], op);
                        }
                    }

                    $j('#cadastro_nacional').length < 11 ? $j('#cadastro_nacional').inputmask('99.999.999/9999-99', options) : 
                        $j('#cadastro_nacional').inputmask('999.999.999-99', options);
                });
            </script>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-secondary">@if($editavel == false)Fechar @else Confirmar @endif</button>
            </div>

        </form>
    @endif
</div>





<footer class="container">
    <!--<a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
</footer>
@endsection('content')