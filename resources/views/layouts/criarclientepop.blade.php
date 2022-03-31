@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <div class="container-fluid">
        <div class="hstack gap-2 ">
            <div class="col-md-11 ">
                <h1>Cadastrar cliente</h1>
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
                                        <p><strong>Nome completo: </strong>forneça o nome completo do cliente (obrigatório).</p>
                                        <p><strong>Telefone: </strong>forneça o contato do cliente (opcional).</p>
                                        <p><strong>CEP: </strong>forneça o CEP do cliente (obrigatório, apenas números).</p>
                                        <p><strong>Endereço: </strong>forneça o endereço do cliente (obrigatório).</p>
                                        <p><strong>CPF/CNPJ: </strong>forneça o CPF ou CNPJ do cliente (obrigatório, apenas números).</p>
                                        <p><strong>Cidade: </strong>selecione a cidade do cliente (obrigatório).</p>
                                        <p><strong>Observação: </strong>insira uma observação ao cliente (opcional).</p>
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
        <div class="">
            <form id="criarclienteform" class="row g-3" action="/cliente-enviar" method="POST" autocomplete="off">
                @csrf
                <div class="col-md-7">
                    <!--VER IDS-->
                    <label for="nomecliente" class="form-label">Nome Completo</label>
                    <input type="text" oninvalid="this.setCustomValidity('O nome é obrigatório')" oninput="setCustomValidity('')" maxlength="200" class="form-control" id="nome" required name="nome">
                </div>
                <div class="col-md-3">
                    <label for="fonecliente" class="form-label">Telefone</label>
                    <input type="text" maxlength="15" class="form-control" id="fone" name="fone" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
                </div>
                <div class="col-md-2">
                    <label for="cepcliente" class="form-label">CEP</label>
                    <input type="text" maxlength="8" class="form-control" id="cep" oninvalid="this.setCustomValidity('O CEP é obrigatório')" oninput="setCustomValidity('')" required name="cep" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
                </div>
                <div class="col-md-5">
                    <label for="enderecocliente" class="form-label">Endereço</label>
                    <input type="text" maxlength="150" class="form-control" oninvalid="this.setCustomValidity('O endereço é obrigatório')" oninput="setCustomValidity('')" id="endereco" required name="endereco">
                </div>
                <div class="col-md-3">
                    <label for="cadastronacionalcliente" class="form-label">CPF/CNPJ</label>
                    <input type="text" class="form-control" oninvalid="this.setCustomValidity('O CPF/CNPJ é obrigatório')" oninput="setCustomValidity('')" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" maxlength="14" id="cadastro_nacional" required name="cadastro_nacional">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Cidade</label>
                    <br>
                    <select required id="cidade_id" name="cidade_id" class="col-md-12 form-select">
                        <option value=''>Selecione a cidade</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="obscliente" class="form-label">Observações</label>
                    <textarea class="form-control" maxlength="280" id="obs" name="obs" rows="2"></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary"  > Cadastrar </button>
                </div>
            </form>
        </div>
    </div>
    <footer class="container">
        <!--<a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
    </footer>
</div>
<script>
    $(document).ready(function() {
        $("form").submit(function() {
            var $form = $(this);
            // submit form
            $.post($form.attr('action'), $form.serializeArray());
            // alert
            alert("Cliente cadastrado com sucesso.");
            // close window
            window.close();
            // return
            return false;
        });
    });
</script>

@endsection('content')