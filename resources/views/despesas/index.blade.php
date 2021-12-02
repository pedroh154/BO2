@extends('layouts.app')
@section('content')


<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<script>
    var valor = $despesa.valor;
    var valorformatado = valor.toLocaleString("pt-BR", {
        style: "currency",
        currency: "BRL"
    });
    document.getElementById('valorformatado').innerHTML = number_format;
</script>



<!--<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->
<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <div class="container-fluid">
        <h1>Despesas</h1>
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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="/despesas/novadespesa" role="button">Cadastrar despesa</a>
        </div> <br>
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead>
                <tr style="text-align: center;">
                    <th style="width: 150px;" scope="col">Categoria</th>
                    <th style="width: 70px;" scope="col">Data</th>
                    <th style="width: 100px;" scope="col">Valor</th>
                    <th style="width: 75px;" scope="col">Descrição</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($listDespesas as $despesa)
                <tr>
                    <td style="text-align: left;" class="col-md-3">{{ $despesa->categoria }}</td>
                    </td>

                    <td style="text-align: center;" class="col-md-2">{{ $despesa->data }}</td>
                    </td>


                    <td style="text-align: right;" class="col-md-2">R$ {{ number_format($despesa->valor, 2)}}</td>
                    </td>


                    <td style="text-align: left;" class="col-md-4">{{ $despesa->desc }}</td>

                    <td class="col-md-1" style="text-align: center;">
                        <div class="action-buttons hstack gap-2">
                            <!--detalhes-->
                            <a href="{{url("despesas/$despesa->id")}}" class="" data-rel="" title="" data-original-title="">
                                <i class="fas fa-file-alt"> </i>
                            </a>
                            <!--editar-->
                            <a href="{{"/despesas/editar/$despesa->id"}}" data-toggle="" class="" style="" data-original-title="" title="">
                                <i class="fas fa-edit"> </i>
                            </a>
                            <!--apagar-->
                            <form action="{{"/despesas/excluir/$despesa->id"}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </form>
                        </div>
                    </td>
                </tr>

                @endforeach


            </tbody>

        </table>
    </div>
</div>
<footer class="container">
    <!--  <a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
</footer>
@endsection('content')