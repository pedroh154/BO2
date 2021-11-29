@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!--<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">Editar CT-e</h1>

    @if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
        {{$erro}}<br>
        @endforeach
    </div>
    @endif

    <h4 class="container-fluid">Forneça os dados abaixo:</h4> <br>
    <!--REVER ACTION-->
    <div class="container-fluid">
        <form class="row g-3" action="/cte-enviar" method="POST">
            @csrf
            <!--REVER FOR e ID-->
            <div class="col-md-4">
                <label for="numcte" class="form-label">Número CT-e</label>
                <input type="number" class="form-control" name="numero_cte" id="numero_cte" required>
            </div>
            <div class="col-md-4">
                <label for="valorcte" class="form-label">Valor CT-e</label>
                <input type="number" class="form-control" name="valor_cte" id="valor_cte" placeholder="R$" required>
            </div>
            <div class="col-md-4">
                <label for="qtdevol" class="form-label">Quantidade de volumes</label>
                <input type="number" class="form-control" name="volume" id="volume" required>
            </div>
            <div class="col-md-4">
                <label for="numnf" class="form-label">Número NF</label>
                <input type="number" class="form-control" name="numero_nf" id="numero_nf" required>
            </div>
            <div class="col-md-4">
                <label for="valornf" class="form-label">Valor NF</label>
                <input type="number" class="form-control" name="valor_nf" id="valor_nf" placeholder="R$" required>
            </div>
            <div class="col-md-4">
                <label for="data" class="form-label">Data de chegada</label>
                <input type="date" class="form-control" name="data_chegada" id="data_chegada">
            </div>
            <div class="col-md-4">
                <label for="tipo_pagamento" class="form-label">Método de pagamento</label>
                <select id="tipo_pagamento" name="tipo_pagamento" class="form-select">
                    <option selected value="0">CIF</option>
                    <option value="1">FOB</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="cidade_remetente_id" class="form-label">Cidade remetente</label>
                <input id="cidade_remetente_id" class="form-control" name="cidade_remetente_id" list="listcidadesr" placeholder="Digite para pesquisar..." required>
                <datalist id="listcidadesr">
                    @foreach ($listCidades as $cidade)
                    <option value="{{ $cidade->id }}" hidden> {!! $cidade->name !!} </option>
                    @endforeach
                </datalist>
            </div>
            <div class="col-md-4">
                <label for="cidade_destinataria_id" class="form-label">Cidade destinatária</label>
                <input id="cidade_destinataria_id" class="form-control" name="cidade_destinataria_id" list="listcidadesd" placeholder="Digite para pesquisar..." required>
                <datalist id="listcidadesd">
                    @foreach ($listCidades as $cidade)
                    <option value="{{ $cidade->id }}" hidden> {!! $cidade->name !!} </option>
                    @endforeach
                </datalist>
            </div>

            <div class="mb-2">
                <label for="obs" class="form-label">Observação</label>
                <textarea class="form-control" id="obs" name="obs" rows="2"></textarea>
            </div>
            <BR>
            <hr class="sidebar-divider">
            <h5> Definir cliente</h5>
            <div class="input-group">
                <label for="inputZip" class="col-12">Cliente remetente</label>
                <input id="remetente_id" name="remetente_id" class="form-control" list="listclientes" placeholder="Digite para pesquisar...">
                <datalist id="listclientes">
                    @foreach ($listClientes as $cliente)
                    <option value="{{ $cliente->id }}" hidden> {!! $cliente->nome !!} </option>
                    @endforeach
                </datalist>

                <a href="/novoclientepop" data-target="#criarcliente" data-toggle="modal">
                    <button class="btn btn-outline-secondary" type="button">+</button></a>
                <!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">-->
                <div class="modal fade text-center" id="criarcliente">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group ">
                <label for="inputZip" class="col-12">Cliente destinatário</label>
                <input id="destinatario_id" name="destinatario_id" class="form-control" list="listclientes" placeholder="Digite para pesquisar...">
                <datalist id="listclientes">
                    @foreach ($listCidades as $cidade)
                    <option value="{{ $cidade->id }}" hidden> {!! $cidade->nome !!} </option>
                    @endforeach
                </datalist>
                <a href="/novoclientepop" data-target="#criarcliente" data-toggle="modal">
                    <button class="btn btn-outline-secondary" type="button">+</button></a>
                <div class="modal fade text-center" id="criarcliente">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>






    <footer class="container">
        <!--<a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
    </footer>
    @endsection('content')