@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <div class="container-fluid">
        <div class="hstack gap-2 ">
            <div class="col-md-11">
                <h1>CT-es</h1>
            </div>

            <div class="col-md-1">
                <!-- MODAL HELP CONTEXTO -->
                <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <button type="button" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Precisa de ajuda?">
                        <i class="fa-solid fa-question"></i>
                    </button>
                </span>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Help de Contexto - CT-es</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <h4>Incluir CT-e</h4>
                                    <div class="container-fluid">
                                        <!--         <p><strong>QUATRO OPÇÕES PARA INCLUSÃO DE CT-ES</strong></p> -->
                                        <p><strong>Inserir a chave: </strong>escolhendo entre o sistema SSW e a Receita Federal, basta inserir a chave de acesso no campo embaixo.</p>
                                        <p><strong>Upload XML: </strong>basta selecionar o arquivo XML do CT-e.</p>
                                        <p><strong>Cadastro manual: </strong>uma nova tela será aberta para o cadastro manual do CT-e.</p>
                                    </div>
                                    <hr class="sidebar-divider">
                                    <h4>Filtros</h4>
                                    <div class="container-fluid">
                                        <!--        <p><strong>OPÇÕES DE FILTROS DA TABELA</strong></p>-->
                                        <p><strong>Empresa: </strong>selecione a empresa desejada.</p>
                                        <p><strong>Método de pagamento: </strong>selecione o método de pagamento.</p>
                                        <p><strong>Situação: </strong>selecione a situação do CT-e.</p>
                                        <p><strong>Pesquisa: </strong>digite qualquer dado para filtro (cidade, número de CT-e, destinatário, etc.).</p>
                                        <p><strong>Resetar: </strong>apagar os filtros.</p>
                                        <p><strong>Botão "Atualizar informações": </strong>atualiza automaticamente o estado de entrega do CT-e caso o sistema SSW esteja disponível.</p>
                                    </div>
                                    <hr class="sidebar-divider">
                                    <h4>Tabela</h4>
                                    <div class="container-fluid">
                                        <!--        <p><strong>BOTÕES DA ÚLTIMA COLUNA</strong></p> -->
                                        <p><button class="btn btn-info"><i class="fa-solid fa-file-pdf"></i></button> - download do arquivo PDF do CT-e (quando disponível).</p>
                                        <p><button class="btn btn-info"><i class="fa-solid fa-file-lines"></i></button> - gerar comprovante de entrega (quando disponível).</p>
                                        <!--<p><button class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></button> - detalhes do CT-e.</p>-->
                                        <p><button class="btn btn-info"><i class="fa-solid fa-pen"></i></button> - editar informações do CT-e.</p>
                                        <p><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> - deletar CT-e.</p>
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
        <!-- MODAL HELP CONTEXTO -->

        <!-- checar por ERROS -->
        @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $erro)
            {{$erro}}<br>
            @endforeach
        </div>
        @endif
        <!-- checar por SUCESSO -->
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif

        <div class="d-flex flex-column">
            <hr class="sidebar-divider">
            <h5>Incluir CT-e</h5>
        </div>

        <div class="hstack gap-3">
            <div class="col-md-8">
                <div class="btn-group col-md-2" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" disabled>
                    <!--checked-->
                    <label class="btn btn-outline-primary" for="btnradio1">SSW</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" disabled>
                    <label class="btn btn-outline-primary" for="btnradio2">RF</label>
                </div>
                <div class="col-md-12">
                    <form class="form-horizontal" action="/cte-fetch/" method="POST">
                        @csrf
                        <input id="chavecte" name="chavecte" class="form-control" placeholder="Insira a chave do CT-e" disabled>
                        <button type="submit" class="btn btn-add btn-lg" disabled>Buscar CTe</button>
                    </form>
                </div>
            </div>
            <div class="vstack gap-2 col-md-4">
                <label class="btn btn-default">
                    <button class="btn btn-sm btn-primary shadow-sm" type="submit" disabled>Importar XML do CT-e</button>
                </label>
                <label class="btn btn-default">
                    <a class="btn btn-sm btn-primary shadow-sm" href="/ctes/novocte" type="button"><i class="fas fa-pen-square"></i> Cadastrar CT-e manualmente</a>
                </label>
            </div>

        </div>

        <br>

        <div class="d-flex flex-column">
            <h5>Filtros</h5>
        </div>
        <div class="hstack gap-4 ">
            <div class="col-1">
                <!--d-sm-flex justify-content-between mb-4 container-->
                <label for="filtroempresa" class="form-label">Empresa</label>
                <select id="filtroempresa" class="form-select col-md-12">
                    <option selected value="TODAS">Todas</option>
                    <option  value="UNIAO">União</option>
                    <option value="TEX">TEX</option>
                </select>
            </div>

            <div class="col-md-1">
                <label for="filtropagamento" class="form-label">Pagamento</label>
                <select id="filtropagamento" class="form-select">
                    <option selected>Ambos</option>
                    <option>CIF</option>
                    <option>FOB</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="filtropagamento" class="form-label">Situação</label>
                <select id="filtropagamento" class="form-select">
                    <option selected>Todos</option>
                    <option>Aberto</option>
                    <option>Concluído</option>
                </select>
            </div>
            <div class=" col-md-2">
                <label for="datafinal" class="form-label">Pesquisa</label>
                <input id="search-input" type="search" class="form-control" placeholder="Digite aqui...">
            </div>

            <div class="col-md-2">
                            <label> </label>
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                       <div class="col-md-2">

                            <label> </label>
                           <a href="/contatos"> <button type="button" class="btn btn-outline-danger me-md-2">Resetar</button></a>
                        </div>

            <div class="col-md-1">
                <label for="datafinal" class="form-label"></label>
                <form>
                    <button class="btn btn-sm btn-primary shadow-sm" type="submit" disabled><i class="fas fa-sync"></i> Atualizar informações</button>
                </form>
            </div>
            
        </div>
        <div>
            <br>

            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                    <tr style="text-align: center;">
                        <th style="width: 250px;" scope="col">@sortablelink('cidade_destinataria_id', 'cidade')</th>
                        <th style="width: 300px;" scope="col">@sortablelink('numero_cte', 'CT-e')</th>
                        <th style="width: 100px;" scope="col">@sortablelink('valor_cte', 'Valor')</th>
                        <th style="width: 100px;" scope="col">@sortablelink('tipo_pagamento', 'CIF/FOB')</th>
                        <th style="width: 110px;" scope="col">@sortablelink('volume', 'volume')</th>
                        <th style="width: 400px;" scope="col">@sortablelink('destinatario_id', 'Destinatário')</th>
                        <th style="width: 130px;" scope="col">@sortablelink('finalizado', 'Situação')</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listCtes as $cte)
                    <tr onclick='trclick();' id="id_cte_table{{$cte->id}}">
                    <input type="hidden" id="id_cte_table" value="{{$cte->cidade_remetente->name}}"/>
                    <input type="hidden" id="id_cte_table" value="{{$cte->destinatario->name}}"/>
                    <input type="hidden" id="id_cte_table" value="{{$cte->numero_cte}}"/>
                   
                        <td style="text-align: left; max-width: 150px" class="text-truncate" onclick='tdclick();'>{{ $cte->cidade_remetente->name }}</td>
                        <td style="text-align: right; max-width: 70px" class="text-truncate">{{ $cte->numero_cte }}</td>
                        <td id="valor_cte{{$loop->index}}"style="text-align: right; max-width: 135px" class="text-truncate">{{ $cte->valor_cte }}</td>
                        @if ($cte->tipo_pagamento == "CIF")
                        <td style="text-align: center; max-width: 100px" class="text-truncate">CIF</td>
                        @else
                        <td style="text-align: center; max-width: 100px" class="text-truncate">FOB</td>
                        @endif
                        <td style="text-align: right; max-width: 90px" class="text-truncate">{{ $cte->volume }}</td>
                        <td style="text-align: center; max-width: 400px" class="text-truncate">{{ $cte->destinatario->nome }} - {{ $cte->destinatario->cadastro_nacional }}</td>
                        <td>
                            <div style="text-align: center;">
                                @if ($cte->finalizado == 'CONCLUÍDO')
                                    <span class="badge badge-info">CONCLUÍDO</span>
                                @else
                                    <span class="badge badge-success">ABERTO</span>
                                @endif
                            </div>
                        </td>
                        <td class="col-md-1" style="text-align: center;">
                            <div class="action-buttons hstack gap-2">
                                <!-- criar botão pdf -->
                               <!-- <a href="{{url("ctes/$cte->id")}}" class="" data-rel="" title="" data-original-title=""> -->
                                    <button disabled class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-file-pdf"></i></button>
                               <!-- </a>-->
                                <form method="get" action="{{url("gerarcomprovante/$cte->id")}}">
                                    @if ($cte->finalizado == 'ABERTO')
                                    <!-- criar botão gerar comprovante -->
                                        <button href="" disabled class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-file-lines"></i></button>
                                    @else
                                    <!-- criar botão gerar comprovante -->
                                        <button href="{{url("gerarcomprovante/$cte->id")}}"  class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-file-lines"></i></button>
                                    @endif
                                </form>
                                <!-- criar botão editar -->
                                <a href="{{"/ctes/editar/$cte->id"}}" data-toggle="" class="" style="" data-original-title="" title="">
                                    <button class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-pen"></i></button>
                                </a>
                                <!--apagar-->
                                <form id="excluirCte{{$cte->id}}" action="{{"/ctes/excluir/$cte->id"}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" id="id_cte" value="{{$cte->id}}"/>
                                    <button id ="btnExcluirCte" class="btn btn-danger btn-sm fas fa-trash-alt" type="button"></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $listCtes->links("pagination::bootstrap-4") }}
            </div>
        </div>
    </div>
</div>
<div id="modalExcluir" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmar exclusão</h5>
        <button id="cancelarExclusao"  type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" id="id_cte_modal"/>
        <p>Deseja realmente excluir esse CT-e?</p>
      </div>
      <div class="modal-footer">
        <button id="confirmarExclusao" type="button" class="btn btn-primary">Sim</button>
        <button  id="cancelarExclusao" type="button" class="btn btn-secondary">Não</button>
      </div>
    </div>
  </div>
</div>
<script>
    document.getElementById('datafinal').value = new Date().toDateInputValue();
</script>

<script>
     $(document).on('click', "#cancelarExclusao", (e) => {
            $("#modalExcluir").modal('hide');
        });
      $(document).on('click', "#btnExcluirCte", (e) => {
            $("#modalExcluir").modal('show');
        //    console.log($('id_cte_table'+$(e.target).parent()[0][2].value));
            $("#id_cte_modal").val($(e.target).parent()[0][2].value);
        });

        $(document).on('click', "#confirmarExclusao", (e) => {
            $("#excluirCte"+  $("#id_cte_modal").val()).submit();
        });
    function trclick() {
        console.log('tr clicked')
    };

    function tdclick() {
        console.log('td clicked')
    };
</script>

@endsection('content')