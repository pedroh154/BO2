@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<!--<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->
<h1></h1>



<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <div class="container-fluid">
        <div class="row">
            <p class="h3 mb-0 text-gray-800">Projeto BO2 - Página principal</p>
        </div>
        <div class="d-flex flex-column">
            <hr class="sidebar-divider">
            <h5>Incluir CT-e</h5>
        </div>
        <div class="d-sm-flex align-items-end justify-content-between mb-4 container-fluid">

            <!-- <input type="file" class="form-control">-->
            <div class="col-md-2">
                <label for="filtroempresa" class="form-label">Empresa</label>
                <select id="filtroempresa" class="form-select">
                    <option selected value="UNIAO">União</option>
                    <option value="TEX">TEX</option>
                </select>
            </div>
            <div class="container-fluid">
                <div class="btn-group col-md-2" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="btnradio1">SSW</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio2">RF</label>
                </div>
                <div class="col-md-12">
                    <input type="number" class="form-control" id="chavecte" placeholder="Insira a chave do CT-e">
                </div>
            </div>
            <div class="container">
                <label class="btn btn-default">
                    <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="file"><i class="fas fa-upload"></i> Importar XML</a> <input type="file" hidden>
                </label>
                <label class="btn btn-default">
                    <a class="btn btn-sm btn-primary shadow-sm" href="/ctes/novocte" type="button"><i class="fas fa-pen-square"></i> Cadastrar CT-e manualmente</a>
                </label>
            </div>

            <!--<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="file"><i class="fas fa-upload fa-sm text-white-50"></i> Importar XML</a>-->

        </div>

        <div class="d-flex flex-column">
            <h5>Filtros</h5>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4 container-fluid">
            <div class="col-md-2">
                <a class="btn btn-sm btn-primary shadow-sm" href="" type="button"><i class="fas fa-sync"></i></a>
            </div>
            <div class="input-group col-md-2">
                <input id="search-input" type="search" class="form-control" placeholder="Digite aqui...">
                <button id="search-button" type="button" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="col-md-3">
                <label for="datainicial" class="form-label">Data inicial</label>
                <input type="date" class="form-control" id="datainicial">
            </div>
            <div class="col-md-3">
                <!--deixar dia de hoje como padrao-->
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
                        <td style="text-align: right;">R$ {{ number_format($cte->valor_cte, 2)}}</td>
                        @if ($cte->tipo_pagamento == "0")
                        <td style="text-align: center;">CIF</td>

                        @else
                        <td style="text-align: center;">FOB</td>

                        @endif
                        <td style="text-align: right;">{{ $cte->volume }}</td>
                        <td style="text-align: center;">Nicolas Luis Artino de Aguiar</td>
                        <td>
                            <div class="custom-control custom-checkbox" style="text-align: center;">
                                <input type="checkbox" class="custom-control-input" id="{{ $cte->id }}">
                                <label class="custom-control-label" for="{{ $cte->id }}"></label>
                            </div>
                        </td>
                        <td class="col-md-2" style="text-align: center;">
                            <div class="action-buttons">
                                <!--PDF-->
                                <a href="" class="" data-rel="" title="" data-original-title="">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                                <!--detalhes-->
                                <a href="{{url("ctes/$cte->id")}}" class="" data-rel="" title="" data-original-title="">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                                <!--editar-->
                                <a href="ctes/editarcte" data-toggle="" class="" style="" data-original-title="" title="">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!--apagar-->
                                <a href="" data-rel="" title="" data-original-title="">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                    @endforeach


                    <!-- <tr>
                        <td style="text-align: left;">Canoas</td>
                        <td style="text-align: right;">4322236</td>
                        <td style="text-align: right;">R$ 42,36</td>
                        <td style="text-align: center;">FOB</td>
                        <td style="text-align: right;">7</td>
                        <td style="text-align: center;">Rogério Sousa</td>
                        <td>
                            <div class="custom-control custom-checkbox" style="text-align: center;">
                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2"></label>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align: left;">Ponta Grossa</td>
                        <td style="text-align: right;">7654321</td>
                        <td style="text-align: right;">R$ 221,58</td>
                        <td style="text-align: center;">CIF</td>
                        <td style="text-align: right;">18</td>
                        <td style="text-align: center;">Acir Pires Nobre</td>
                        <td>
                            <div class="custom-control custom-checkbox" style="text-align: center;">
                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                <label class="custom-control-label" for="customCheck3"></label>
                            </div>
                        </td>
                    </tr>
-->
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

<footer class="container">
    <!-- <a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
</footer>
@endsection('content')