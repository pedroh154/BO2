@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<!--<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->

<!---->

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <div class="container-fluid">
        <div class="hstack gap-2 ">
            <div class="col-md-11 ">
                <h1>Cadastrar despesa</h1>
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
                                <h5 class="modal-title" id="exampleModalLabel">Help de Contexto - Cadastrar despesa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <h4>Cadastrar despesa</h4>
                                    <div class="container-fluid">
                                        <p><strong>Categoria: </strong>selecione a categoria da despesa (obrigatório).</p>
                                        <p><strong>Data: </strong>forneça a data da despesa (obritatório).</p>
                                        <p><strong>Valor: </strong>forneça o valor da despesa (obrigatório).</p>
                                        <p><strong>Descrição: </strong>insira uma descrição à despesa (opcional).</p>
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
        <form id="criardespesaform" class="" action="/despesa-enviar" method="POST" autocomplete="off">
            @csrf
            <div class="input-group mb-3">
                <!--VER IDS-->
                <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
                <select class="form-select" id="categoria" name="categoria" required>
                    <option value="Água" selected>Água</option>
                    <option value="Aluguel">Aluguel</option>
                    <option value="Luz">Luz</option>
                    <option value="Manutenção">Manutenção</option>
                    <option value="Outros">Outros</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" name="data" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="text" class="form-control" id="valor" required placeholder="R$" name="valor" oninvalid="this.setCustomValidity('O Valor é obrigatório')" oninput="setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Descrição</label>
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