@extends('layouts.app')
@section('content')

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <div class="container-fluid">
        <div class="hstack gap-2 ">
            <div class="col-md-11 ">
                <h1>Cadastrar CT-e</h1>
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
                                <h5 class="modal-title" id="exampleModalLabel">Help de Contexto - Cadastrar CT-e</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <div class="container-fluid">
                                        <!--         <p><strong>QUATRO OPÇÕES PARA INCLUSÃO DE CT-ES</strong></p> -->
                                        <p><strong>Número do CT-e: </strong>forneça o número do CT-e (obrigatório,
                                            apenas números).</p>
                                        <p><strong>Valor do CT-e: </strong>forneça o valor do CT-e (obrigatório, apenas
                                            números).</p>
                                        <p><strong>Quantidade de volumes: </strong>forneça a quantidade de volumes do
                                            CT-e (obrigatório, apenas números).</p>
                                        <p><strong>Número da NF: </strong>forneça o número da nota fiscal do CT-e
                                            (obrigatório, apenas números).</p>
                                        <p><strong>Valor da NF: </strong>forneça o valor da nota fiscal do CT-e
                                            (obrigatório, apenas números).</p>
                                        <p><strong>Data de chegada: </strong>forneça a data de chegada do CT-e
                                            (obrigatório).</p>
                                        <p><strong>Método de pagamento: </strong>selecione o método de pagamento do CT-e
                                            (obrigatório).</p>
                                        <p><strong>Transportadora: </strong>selecione a transportadora do CT-e
                                            (obrigatório).</p>
                                        <p><strong>Cidade remetente: </strong>selecione a cidade de origem do CT-e
                                            (obrigatório).</p>
                                        <p><strong>Cidade destinatária: </strong>forneça a cidade de destino do CT-e
                                            (obrigatório).</p>
                                        <p><strong>Observação: </strong>insira uma observação ao CT-e (opcional).</p>
                                    </div>
                                    <hr class="sidebar-divider">
                                    <h4>Definir cliente</h4>
                                    <div class="container-fluid">
                                        <!--        <p><strong>OPÇÕES DE FILTROS DA TABELA</strong></p>-->
                                        <p><strong>Clientes remetente e destinatário: </strong>selecione o cliente
                                            remetente ou destinatário do CT-e (obrigatório). Caso necessário, adicione
                                            um novo cliente.</p>

                                    </div>
                                    <hr class="sidebar-divider">
                                    <h4>Cadastrar cliente</h4>
                                    <div class="container-fluid">
                                        <p><strong>Nome completo: </strong>forneça o nome completo do cliente
                                            (obrigatório).</p>
                                        <p><strong>Telefone: </strong>forneça o contato do cliente (opcional).</p>
                                        <p><strong>CEP: </strong>forneça o CEP do cliente (obrigatório, apenas números).
                                        </p>
                                        <p><strong>Endereço: </strong>forneça o endereço do cliente (obrigatório).</p>
                                        <p><strong>CPF/CNPJ: </strong>forneça o CPF ou CNPJ do cliente (obrigatório,
                                            apenas números).</p>
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
            <form id="criarcteform" class="row g-3" action="/cte-enviar" method="POST" autocomplete="new-password">
                @csrf
                <div class="col-md-4">
                    <label for="numcte" class="form-label">Número do CT-e</label>
                    <input type="text" maxlength="20" oninvalid="this.setCustomValidity('O número do CT-e é obrigatório')" oninput="setCustomValidity('')" class="form-control" name="numero_cte" id="numero_cte" required onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
                </div>
                <div class="col-md-4">
                    <label for="valorcte" class="form-label">Valor do CT-e</label>
                    <input type="text" maxlength="10" oninvalid="this.setCustomValidity('O Valor do CT-e é obrigatório')" oninput="setCustomValidity('')" class="form-control" name="valor_cte" id="valor_cte" placeholder="R$" required onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
                </div>
                <div class="col-md-4">
                    <label for="qtdevol" class="form-label">Quantidade de volumes</label>
                    <input type="text" maxlength="6" class="form-control" oninvalid="this.setCustomValidity('A Quantidade de volumes é obrigatória')" oninput="setCustomValidity('')" name="volume" id="volume" required onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
                </div>
                <div class="col-md-4">
                    <label for="numnf" class="form-label">Número da NF</label>
                    <input type="text" maxlength="20" oninvalid="this.setCustomValidity('O número da NF é obrigatório')" oninput="setCustomValidity('')" class="form-control" name="numero_nf" id="numero_nf" required onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
                </div>
                <div class="col-md-4">
                    <label for="valornf" class="form-label">Valor da NF</label>
                    <input type="text" maxlength="10" class="form-control" oninvalid="this.setCustomValidity('O Valor da NF é obrigatório')" oninput="setCustomValidity('')" name="valor_nf" id="valor_nf" placeholder="R$" required onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
                </div>
                <div class="col-md-4">
                    <label for="data" class="form-label">Data de chegada</label>
                    <input type="date" class="form-control" oninvalid="this.setCustomValidity('A Data de chegada é obrigatória')" oninput="setCustomValidity('')" name="data_chegada" id="data_chegada" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="col-md-2">
                    <label for="tipo_pagamento" class="form-label">Método de pagamento</label>
                    <select required id="tipo_pagamento" name="tipo_pagamento" class="form-select">
                        <option selected value="CIF">CIF</option>
                        <option value="FOB">FOB</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="transportadora" class="form-label">Transportadora</label>
                    <select required id="transportadora_id" name="transportadora_id" class="form-select">
                        @foreach ($listTransp as $transp)
                        <option value="{{ $transp->id }}"> {!! $transp->nome !!} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="cidade_remetente_id" class="form-label">Cidade remetente</label>
                    <br>
                    <select id='cidade_remetente_id' name="cidade_remetente_id" class="col-md-12 form-select">
                        <option value=''>Selecione a cidade remetente</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="cidade_destinataria_id" class="form-label">Cidade destinatária</label>
                    <br>
                    <select id="cidade_destinataria_id" name="cidade_destinataria_id" class="col-md-12 form-control">
                        <option value=''>Selecione a cidade destinatária</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label for="obs" class="form-label">Observação</label>
                    <textarea class="form-control" maxlength="280" id="obs" name="obs" rows="2"></textarea>
                </div>
                <BR>
                <hr class="sidebar-divider">

                <h5> Definir cliente</h5>
                <div class="col-md-4">
                    <label for="remetente_id" class="form-label">Cliente remetente</label>
                    <br>
                    <select id="remetente_id" name="remetente_id" class="col-md-11 form-control">
                        <option value='0'>Selecione o cliente remetente</option>
                    </select>
                    <a href="/clientes/novocliente" target="_blank">
                        <button class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-plus"></i></button></a>
                 <!--   <div class="modal fade text-center" id="criarcliente">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            </div>
                        </div>
                    </div>-->
                </div>

                <div class="col-md-4">
                    <label for="destinatario_id" class="form-label">Cliente destinatário</label>
                    <br>
                    <select id="destinatario_id" name="destinatario_id" class="col-md-11 form-control">
                        <option value='0'>Selecione o cliente destinatário</option>
                    </select>
                    <a href="/clientes/novocliente" target="_blank">
                        <button class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-plus"></i></button></a>
                    <!--<div class="modal fade text-center" id="criarcliente">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            </div>
                        </div>
                    </div>-->
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>

            </form>
        </div>
        <footer class="container">
        </footer>
    </div>
</div>

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
    }, );

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

<!--<script>
    $(document).on('change', "#destinatario_id", function() {
        console.log($(this).val());

        if ($('#remetente_id').val() == $(this).val()) {
            alert("os dois tao igual");
        }


    });

    console.log($(".select2"))
</script>-->

@endsection('content')