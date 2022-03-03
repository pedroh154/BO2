@extends('layouts.app')
@section('content')

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">Cadastrar CT-e</h1>

    @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $erro)
            {{$erro}}<br>
        @endforeach
        </div>
    @endif

    <h4 class="container-fluid">Forneça os dados abaixo:</h4> <br>

    <div class="container-fluid">
        <form class="row g-3" action="/cte-enviar" method="POST" autocomplete="new-password">
            @csrf
            <div class="col-md-4">
                <label for="numcte" class="form-label">Número CT-e</label>
                <input type="text" maxlength="20" class="form-control" name="numero_cte" id="numero_cte" required onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
            </div>
            <div class="col-md-4">
                <label for="valorcte" class="form-label">Valor CT-e</label>
                <input type="text" maxlength="10" class="form-control" name="valor_cte" id="valor_cte" placeholder="R$" required onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
            </div>
            <div class="col-md-4">
                <label for="qtdevol" class="form-label">Quantidade de volumes</label>
                <input type="text" maxlength="6" class="form-control" name="volume" id="volume" required onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
            </div>
            <div class="col-md-4">
                <label for="numnf" class="form-label">Número NF</label>
                <input type="text" maxlength="20" class="form-control" name="numero_nf" id="numero_nf" required onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
            </div>
            <div class="col-md-4">
                <label for="valornf" class="form-label">Valor NF</label>
                <input type="text" maxlength="10" class="form-control" name="valor_nf" id="valor_nf" placeholder="R$" required onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
            </div>
            <div class="col-md-4">
                <label for="data" class="form-label">Data de chegada</label>
                <input type="date" class="form-control" name="data_chegada" id="data_chegada" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="col-md-2">
                <label for="tipo_pagamento" class="form-label">Método de pagamento</label>
                <select id="tipo_pagamento" name="tipo_pagamento" class="form-select">
                    <option selected value="CIF">CIF</option>
                    <option value="FOB">FOB</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="transportadora" class="form-label">Transportadora</label>
                <select id="transportadora_id" name="transportadora_id" class="form-select">
                    @foreach ($listTransp as $transp)
                        <option value="{{ $transp->id }}"> {!! $transp->nome !!} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="cidade_remetente_id" class="form-label">Cidade remetente</label>
                <br>
                <select id="cidade_remetente_id" name="cidade_remetente_id" style='width: 300px;'>
                    <option value='0'>Selecione a cidade remetente</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="cidade_destinataria_id" class="form-label">Cidade destinatária</label>
                <br>
                <select id="cidade_destinataria_id" name="cidade_destinataria_id" style='width: 300px;'>
                    <option value='0'>Selecione a cidade destinatária</option>
                </select>
            </div>

            <div class="mb-2">
                <label for="obs" class="form-label">Observação</label>
                <textarea class="form-control" maxlength="280" id="obs" name="obs" rows="2"></textarea>
            </div>
            <BR>
            <hr class="sidebar-divider">
            <h5> Definir cliente</h5>
            <div class="input-group">
                <label for="inputZip" class="col-12">Cliente remetente</label>
                <input autocomplete="new-password" id="remetente_id" name="remetente_id" class="form-control" list="listclientes" placeholder="Digite para pesquisar..." required>
                <datalist id="listclientes">
                    @foreach ($listClientes as $cliente)
                        <option value="{{ $cliente->id }}" hidden> {!! $cliente->nome !!} </option>
                    @endforeach
                </datalist>
                <a href="/clientes/novoclientepop" data-target="#criarcliente" data-toggle="modal">
                    <button class="btn btn-outline-secondary" type="button">+</button></a>
                <div class="modal fade text-center" id="criarcliente">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group ">
                <label for="inputZip" class="col-12">Cliente destinatário</label>
                <input autocomplete="new-password" id="destinatario_id" name="destinatario_id" class="form-control" list="listclientes" placeholder="Digite para pesquisar..." required>
                <datalist id="listclientes">
                    @foreach ($listCidades as $cidade)
                        <option value="{{ $cidade->id }}" hidden> {!! $cidade->nome !!} </option>
                    @endforeach
                </datalist>
                <a href="/clientes/novoclientepop" data-target="#criarcliente" data-toggle="modal">
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
</footer>

<!-- EX ANDERSON -->
<script>
    console.log("a");

    $(document).ready(function() {
        let elementSelect2 = $("#codigo_fornecedor");
        console.log(elementSelect2);
            let url = "fornecedor/backendCall/selectFornecedor";
            elementSelect2.select2({
                placeholder: "Selecione...",
                allowClear: false,
                multiple: false,
                quietMillis: 2000,
                initSelection: function(element, callback) {
                    $.ajax({
                        url: url,
                        dataType: "json",
                        type: 'POST',
                        params: {
                            contentType: "application/json; charset=utf-8",
                        },
                        data: {
                            termo: $(element).val(),
                            page: 1
                        },
                        success: (data) => callback(data.itens[0])
                    })
                },
                ajax: {
                    url: url,
                    dataType: 'json',
                    type: 'POST',
                    data: (term, page) => {
                        return {
                            termo: term,
                            page: page,
                        };
                    },
                    results: (data, page) => {
                        if (page == 1) {
                            $(elementSelect2).data('count', data.count);
                        }
                        return {
                            results: data.itens,
                            more: (page * 30) < $(elementSelect2).data('count')
                        };
                    }
                },
                formatResult: (data) => data.text,
                formatSelection: (data) => data.text
            });
        },
    );

    // const select2ProdutoFunctions = {
    //     init: () => {
    //         select2ProdutoFunctions.buscarFornecedor();
    //         console.log("b");
    //     },

    //     buscarFornecedor: (caller) => {
    //         console.log("c");
    //         let elementSelect2 = $("[data-select='buscarFornecedor']");
    //         let url = ${BASEURL}/fornecedor/backendCall/selectFornecedor;
    //         elementSelect2.select2({
    //             placeholder: "Selecione...",
    //             allowClear: false,
    //             multiple: false,
    //             quietMillis: 2000,
    //             initSelection: function(element, callback) {
    //                 $.ajax({
    //                     url: url,
    //                     dataType: "json",
    //                     type: 'POST',
    //                     params: {
    //                         contentType: "application/json; charset=utf-8",
    //                     },
    //                     data: {
    //                         termo: $(element).val(),
    //                         page: 1
    //                     },
    //                     success: (data) => callback(data.itens[0])
    //                 })
    //             },
    //             ajax: {
    //                 url: url,
    //                 dataType: 'json',
    //                 type: 'POST',
    //                 data: (term, page) => {
    //                     return {
    //                         termo: term,
    //                         page: page,
    //                     };
    //                 },
    //                 results: (data, page) => {
    //                     if (page == 1) {
    //                         $(elementSelect2).data('count', data.count);
    //                     }
    //                     return {
    //                         results: data.itens,
    //                         more: (page * 30) < $(elementSelect2).data('count')
    //                     };
    //                 }
    //             },
    //             formatResult: (data) => data.text,
    //             formatSelection: (data) => data.text
    //         });
    //     },
    // };

    // document.addEventListener("DOMContentLoaded", () => {
    //     dataGridProdutoFunctions.init();
    //     produtoFunctions.init();
    //     select2ProdutoFunctions.init();

    // });
</script> 
@endsection('content')