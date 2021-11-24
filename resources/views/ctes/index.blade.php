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

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="file"><i class="fas fa-upload fa-sm text-white-50" type="file"></i> Importar XML</a>

    

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
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td style="text-align: left;">São Paulo</td>
                        <td style="text-align: right;">123457</td>
                        <td style="text-align: right;">R$ 57,21</td>
                        <td style="text-align: center;">FOB</td>
                        <td style="text-align: right;">21</td>
                        <td style="text-align: center;">Nicolas Luis Artino de Aguiar</td>
                        <td>
                            <div class="custom-control custom-checkbox" style="text-align: center;">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1"></label>
                            </div>
                        </td>
                    </tr>

                    <tr>
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

                </tbody>
            </table>
        </div>
    </div>
</div>


<footer class="container">
    <!-- <a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
</footer>
@endsection('content')