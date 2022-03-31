@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <div class="container-fluid">
        <div class="hstack gap-2 ">
            <div class="col-md-11">
                <h1>Contatos</h1>
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
                                <h5 class="modal-title" id="exampleModalLabel">Help de Contexto - Contatos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                <h4>Filtros</h4>
                                <div class="container-fluid">
                                    <p><strong>Pesquisa: </strong>digite qualquer dado para filtro (nome, telefone, endereço, etc.).</p>
                                    <p><strong>Resetar: </strong>apagar os filtros.</p>
                                </div>
                                    <h4>Tabela</h4>
                                    <div class="container-fluid">

                                        <p><button class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></button> - detalhes do contato.</p>
                                        <p><button class="btn btn-info"><i class="fa-solid fa-pen"></i></button> - editar informações do contato.</p>
                                        <p><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> - deletar contato.</p>
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

        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="/contatos/novocontato" role="button">Cadastrar contato</a>
        </div> -->
        <hr class="sidebar-divider">
        <div class="row">
            <div class="col-md-2">

                <form action="/contatos/pesquisar" method="POST">
                    @csrf
                    <div class="hstack gap-3">
                        <div class="col-md-12">
                            <label for="datafinal" class="form-label">Pesquisa</label>
                            <input id="search" name="search" type="text" class="form-control me-auto" placeholder="Digite aqui...">
                        </div>
                        <div class="col-md-2">
                            <label> </label>
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                        <div class="vr"></div>
                       <div class="col-md-2">

                            <label> </label>
                           <a href="/contatos"> <button type="button" class="btn btn-outline-danger me-md-2">Resetar</button></a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-2 offset-md-8">
                <label for="datafinal" class="form-label">                                                   </label>
                <a class="btn btn-primary" href="/contatos/novocontato" role="button">Cadastrar contato</a>
            </div>
        </div> <br>
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead>
                <tr style="text-align: center;">
                    <th style="width: 150px;" scope="col">Nome</th>
                    <th style="width: 70px;" scope="col">Telefone</th>
                    <th style="width: 100px;" scope="col">Endereço</th>
                    <th style="width: 75px;" scope="col">Descrição</th>
                    <th></Th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listContatos as $contato)
                <tr>
                    <td style="text-align: left; max-width: 150px;" class="text-truncate">{{ $contato->nome }}</td>
                    </td>

                    <td id="fone{{$loop->index}}" style="text-align: left; max-width: 70px;" class="text-truncate">{{ $contato->fone }}</td>
                    </td>


                    <td style="text-align: left; max-width: 100px;" class="text-truncate">{{$contato->endereco}}</td>
                    </td>


                    <td style="text-align: left; max-width: 75px;" class="text-truncate">{{ $contato->desc }}</td>
                    </td>
                    <td class="col-md-1" style="text-align: center;">
                        <div class="action-buttons hstack gap-2">
                            <!-- criar botão editar -->
                            <a href="{{"/contatos/editar/$contato->id"}}" data-toggle="" class="" style="" data-original-title="" title="">
                                <button class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-pen"></i></button>
                            </a>
                            <!--apagar-->
                            <form id="excluirCte{{$contato->id}}" action="{{"/contatos/excluir/$contato->id"}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" id="id_cte" value="{{$contato->id}}"/>
                                <button id="btnExcluirCte" class="btn btn-danger btn-sm fas fa-trash-alt" type="button"></button>
                            </form>
                        </div>
                    </td>
                </tr>

                @endforeach


            </tbody>

        </table>

        <div class="d-flex justify-content-center">
            @if(isset($filters))
            {{ $listContatos->appends($filters)->links("pagination::bootstrap-4") }}
            @else
            {{ $listContatos->links("pagination::bootstrap-4") }}
            @endif
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
          <p>Deseja realmente excluir este cte.</p>
        </div>
        <div class="modal-footer">
          <button id="confirmarExclusao" type="button" class="btn btn-primary">Sim</button>
          <button  id="cancelarExclusao" type="button" class="btn btn-secondary">Não</button>
        </div>
      </div>
    </div>
  </div>

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
<!--<a href="/novocontato" >
    <input type="submit" value="" class="btn btn-outline-dark" style="color: #FFFFFF;">-->

<!--https://stackoverflow.com/questions/2150238/php-variable-in-html-no-other-way-than-php-echo-var-->
</a> <br>
<footer class="container">
    <!-- <a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
</footer>
@endsection('content')