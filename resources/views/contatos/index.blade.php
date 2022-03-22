@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<!-- <div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->
<!--<h1></h1>-->
<!--<p style="color: #FFFFFF;"></p>-->

<!--<table class="table table-striped table-hover table-bordered caption-top" >-->

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <div class="container-fluid">
        <div class="hstack gap-2 ">
            <div class="col-md-11">
                <h1>Contatos</h1>
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
                                <h5 class="modal-title" id="exampleModalLabel">Help de Contexto - Contatos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <p><strong>Pesquisa: </strong>digite qualquer dado para filtro (nome, telefone, endereço, etc.).</p>
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


        @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $erro)
            {{$erro}}<br>
            @endforeach
        </div>
        @endif
        <!-- checar por sucesso -->
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        @csrf
        @method('DELETE')
        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="/contatos/novocontato" role="button">Cadastrar contato</a>
        </div> -->
        <div class="row">
            <div class="col-md-2">

                <label for="datafinal" class="form-label">Pesquisa</label>
                <input id="search-input" type="search" class="form-control" placeholder="Digite aqui...">

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
                    <td style="text-align: left;">{{ $contato->nome }}</td>
                    </td>

                    <td id="fone{{$loop->index}}" style="text-align: left;">{{ $contato->fone }}</td>
                    </td>


                    <td style="text-align: left;">{{$contato->endereco}}</td>
                    </td>


                    <td style="text-align: left;">{{ $contato->desc }}</td>
                    </td>
                    <td class="col-md-1" style="text-align: center;">
                        <div class="action-buttons hstack gap-2">
                            <!-- criar botão visualizar -->
                            <a href="{{url("contatos/$contato->id")}}" class="" data-rel="" title="" data-original-title="">
                                <button class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </a>
                            <!-- criar botão editar -->
                            <a href="{{"/contatos/editar/$contato->id"}}" data-toggle="" class="" style="" data-original-title="" title="">
                                <button class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-pen"></i></button>
                            </a>
                            <!--apagar-->
                            <form action="{{"/contatos/excluir/$contato->id"}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>

                @endforeach


            </tbody>

        </table>

        <div class="d-flex justify-content-center">
            {{ $listContatos->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
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