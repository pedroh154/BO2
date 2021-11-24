@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

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
                <label for="inputEmail4" class="form-label">Número CT-e:</label>
                <input type="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Valor CT-e</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="R$">
            </div>
            <div class="col-md-4">
                <label for="inputAddress" class="form-label">Quantidade de volumes:</label>
                <input type="text" class="form-control" id="inputAddress">
            </div>
            <div class="col-md-4">
                <label for="inputAddress2" class="form-label">Número NF:</label>
                <input type="text" class="form-control" id="inputAddress2">
            </div>
            <div class="col-md-4">
                <label for="inputCity" class="form-label">Valor NF:</label>
                <input type="text" class="form-control" id="inputCity" placeholder="R$">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Data de chegada:</label>
                <input type="date" class="form-control" id="inputState">
            </div>
            <div class="col-md-4">
                <label for="inputZip" class="form-label">Método de pagamento</label>
                <select id="inputState" class="form-select">
                    <option selected>CIF</option>
                    <option>FOB</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputZip" class="form-label">Cidade remetente:</label>
                <select id="inputState" class="form-select">
                    <option selected></option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputZip" class="form-label">Cidade destinatária:</label>
                <select id="inputState" class="form-select">
                    <option selected></option>
                </select>
            </div>
            <BR>
            <hr class="sidebar-divider">
            <h5> Definir cliente</h5>
            <div class="input-group">
                <label for="inputZip" class="col-12">Cliente remetente:</label>
                <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <a href="/novocliente">
                    <button class="btn btn-outline-secondary" type="button">+</button></a>
            </div>
            <div class="input-group">
                <label for="inputZip" class="col-12">Cliente destinatário:</label>
                <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <a href="/novocliente">
                    <button class="btn btn-outline-secondary" type="button">+</button></a>
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