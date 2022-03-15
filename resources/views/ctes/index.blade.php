@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">


<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <div class="container-fluid">
        
        <h1>CT-es</h1>
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
        <div class="d-flex flex-column">
            <hr class="sidebar-divider">
            <h5>Incluir CT-e</h5>
        </div>
        <div class="hstack gap-3">

            <div class="col-md-8">
                <div class="btn-group col-md-2" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="btnradio1">SSW</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio2">RF</label>
                </div>
                <div class="col-md-12">
                    <form class="form-horizontal" action="/cte-fetch/" method="POST">
                        @csrf
                        <input id="chavecte" name="chavecte" class="form-control" placeholder="Insira a chave do CT-e">
                        <button type="submit" class="btn btn-add btn-lg">Buscar CTe</button>    
                    </form>
                </div>
            </div>
            <div class="vstack gap-2 col-md-4">
                <label class="btn btn-default">
                    <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm " type="file"><i class="fas fa-upload"></i> Importar XML do CT-e</a> <input type="file" hidden>
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
            <div class="col-2">
                <!--d-sm-flex justify-content-between mb-4 container-->
                <label for="filtroempresa" class="form-label">Empresa</label>
                <select id="filtroempresa" class="form-select col-md-12">
                    <option selected value="UNIAO">União</option>
                    <option value="TEX">TEX</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="datainicial" class="form-label">Data inicial</label>
                <input type="date" class="form-control" id="datainicial">
            </div>
            <div class="col-md-2">
                <label for="datafinal" class="form-label">Data final</label>
                <input type="date" class="form-control" id="datafinal" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-md-2">
                <label for="filtropagamento" class="form-label">Método de pagamento</label>
                <select id="filtropagamento" class="form-select">
                    <option selected>CIF</option>
                    <option>FOB</option>
                </select>
            </div>

            <div class="input-group col-md-2">
                <input id="search-input" type="search" class="form-control" placeholder="Digite aqui...">
                <button id="search-button" type="button" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <a class="btn btn-sm btn-primary shadow-sm" href="" type="button"><i class="fas fa-sync"></i> Atualizar informações</a>

        </div>
        <div>
            <br>

            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                    <tr style="text-align: center;">
                        <th style="width: 150px;" scope="col">Cidade</th>
                        <th style="width: 70px;" scope="col">CT-e</th>
                        <th style="width: 100px;" scope="col">Valor</th>
                        <th style="width: 75px;" scope="col">CIF/FOB</th>
                        <th style="width: 90px;" scope="col">Volumes</th>
                        <th style="width: 400px;" scope="col">Destinatário</th>
                        <th style="width: 60px;" scope="col">✓</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listCtes as $cte)
                    <tr onclick='trclick();'>
                        <td style="text-align: left;" onclick='tdclick();'>{{ $cte->cidade_remetente_id }}</td>
                        <td style="text-align: right;">{{ $cte->numero_cte }}</td>
                        <td id="valor_cte" class="valor_cte" style="text-align: right;">R$ {{ $cte->valor_cte }}</td>
                        @if ($cte->tipo_pagamento == "CIF")
                            <td style="text-align: center;">CIF</td>
                        @else
                            <td style="text-align: center;">FOB</td>
                        @endif
                        <td style="text-align: right;">{{ $cte->volume }}</td>
                        <td style="text-align: center;">{{ $cte->destinatario_id }}</td>
                        <td>
                            <div class="custom-control custom-checkbox" style="text-align: center;">
                                <input type="checkbox" class="custom-control-input" id="{{ $cte->id }}">
                                <label class="custom-control-label" for="{{ $cte->id }}"></label>
                            </div>
                        </td>
                        <td class="col-md-1" style="text-align: center;">
                            <div class="action-buttons hstack gap-2">
                                <!-- criar botão pdf -->
                                <a href="{{url("ctes/$cte->id")}}" class="" data-rel="" title="" data-original-title="">
                                    <button class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-file-pdf"></i></button>
                                </a>
                                @if ($cte->finalizado == true)
                                    <!-- criar botão gerar comprovante -->
                                    <a href="{{url("gerarcomprovante/$cte->id")}}" class="" data-rel="" title="" data-original-title="">
                                        <button class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-file-lines"></i></button>
                                    </a>
                                @else
                                    <!-- criar botão gerar comprovante -->
                                    <a href="{{url("gerarcomprovante/$cte->id")}}" class="" data-rel="" title="" data-original-title="">
                                        <button disabled class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-file-lines"></i></button>
                                    </a>
                                @endif
                                <!-- criar botão visualizar -->
                                <a href="{{url("ctes/$cte->id")}}" class="" data-rel="" title="" data-original-title="">
                                    <button class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </a>
                                <!-- criar botão editar -->
                                <a href="{{"/ctes/editar/$cte->id"}}" data-toggle="" class="" style="" data-original-title="" title="">
                                    <button class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-pen"></i></button>
                                </a>
                                <!--apagar-->
                                <form action="{{"/ctes/excluir/$cte->id"}}" method="POST">
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
        </div>
    </div>
</div>

<script>
    document.getElementById('datafinal').value = new Date().toDateInputValue();
</script>


<script>
    function trclick() {
        console.log('tr clicked')
    };

    function tdclick() {
        console.log('td clicked')
    };
</script>

@endsection('content')