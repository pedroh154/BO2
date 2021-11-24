@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!--<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">Cadastrar CT-e</h1>

    <h4 class="container-fluid">Forneça os dados abaixo:</h4> <br>
    <!--REVER ACTION-->
    <div class="container-fluid">
        <form class="row g-3" action="/cte-enviar" method="POST">
            @csrf
            <!--REVER FOR e ID-->
            <div class="col-md-4">
                <label for="numcte" class="form-label">Número CT-e</label>
                <input type="number" class="form-control" id="numcte" required>
            </div>
            <div class="col-md-4">
                <label for="valorcte" class="form-label">Valor CT-e</label>
                <input type="number" class="form-control" id="valorcte" placeholder="R$" required>
            </div>
            <div class="col-md-4">
                <label for="qtdevol" class="form-label">Quantidade de volumes</label>
                <input type="number" class="form-control" id="qtdevol" required>
            </div>
            <div class="col-md-4">
                <label for="numnf" class="form-label">Número NF</label>
                <input type="number" class="form-control" id="numnf" required>
            </div>
            <div class="col-md-4">
                <label for="valornf" class="form-label">Valor NF</label>
                <input type="number" class="form-control" id="valornf" placeholder="R$" required>
            </div>
            <div class="col-md-4">
                <label for="data" class="form-label">Data de chegada</label>
                <input type="date" class="form-control" id="data">
            </div>
            <div class="col-md-4">
                <label for="metodo" class="form-label">Método de pagamento</label>
                <select id="metodo" class="form-select">
                    <option selected>CIF</option>
                    <option>FOB</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="cidadesr" class="form-label">Cidade remetente</label>
                <select id="cidadesr" class="form-select">
                    <option selected></option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="cidadesd" class="form-label">Cidade destinatária</label>
                <select id="cidadesd" class="form-select">
                    <option selected></option>
                </select>
            </div>
            <div class="mb-2">
                <label for="obscte" class="form-label">Observação</label>
                <textarea class="form-control" id="obscte" name="obscte" rows="2"></textarea>
            </div>
            <BR>
            <hr class="sidebar-divider">
            <h5> Definir cliente</h5>
            <div class="input-group">
                <label for="inputZip" class="col-12">Cliente remetente</label>
                <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option selected></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
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
                <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option selected></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
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