@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">


<!--<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <div class="container-fluid">

        <div class="hstack gap-2 ">
            <div class="col-md-11 ">
                <h1>Cadastrar contato</h1>
            </div>
            <div class="col-md-1">
                <!-- Button trigger modal -->
                <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <button type="button" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Precisa de ajuda?">
                        <i class="fa-solid fa-question"></i>
                    </button>
                </span>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Help de Contexto - Cadastrar cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <h4>Cadastrar cliente</h4>
                                    <div class="container-fluid">
                                        <p><strong>Nome completo: </strong>forneça o nome completo do contato (obrigatório).</p>
                                        <p><strong>Telefone: </strong>forneça o telefone do contato (opcional).</p>
                                        <p><strong>Endereço: </strong>forneça o endereço do contato (opcional).</p>
                                        <p><strong>Descrição: </strong>insira uma descrição ao contato (opcional).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="sidebar-divider">
        @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $erro)
            {{$erro}}<br>
            @endforeach
        </div>
        @endif

        <h4 class="">Forneça os dados abaixo:</h4> <br>
        <form id="criarcontatoform" class="" action="/contato-enviar" method="POST" autocomplete="off">
            @csrf
            <div class="mb-3">
                <!--VER IDS-->
                <label for="nomecontato" class="form-label">Nome Completo</label>
                <input type="text" oninvalid="this.setCustomValidity('O Nome é obrigatório')" oninput="setCustomValidity('')" maxlength="200" class="form-control" id="nome" required name="nome" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="telefonecontato" class="form-label">Telefone</label>
                <input type="text" maxlength="15" class="form-control" id="fone" name="fone" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
            </div>
            <div class="mb-3">
                <label for="enderecocontato" class="form-label">Endereço</label>
                <input type="text" maxlength="150" class="form-control" id="endereco" name="endereco" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="descricaocontato" class="form-label">Descrição</label>
                <textarea class="form-control" maxlength="280" id="desc" name="desc" rows="3"></textarea>
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