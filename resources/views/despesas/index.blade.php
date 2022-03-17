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

        <div class="hstack gap-2 ">
            <div class="col-md-11 ">
                <h1>Despesas</h1>
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
                                <h5 class="modal-title" id="exampleModalLabel">Help de Contexto - Despesas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <h4>Tabela</h4>
                                    <div class="container-fluid">
                                        <p><button class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></button> - detalhes da despesa.</p>
                                        <p><button class="btn btn-info"><i class="fa-solid fa-pen"></i></button> - editar informações da despesa.</p>
                                        <p><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> - deletar despesa.</p>
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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Relatório
            </button>
            <!-- Modal -->
            <form action="{{"/gerarDespesa"}}" method="get">
                @csrf
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Relatório de despesas - gastos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body container-fluid">
                                <!--conteúdo do modal-->
                                <h6 class="modal-title"> Selecione o período</h6>
                                <div class="input-group mb-3">
                                    <select class="form-select" id="periodo" name="periodo" required>
                                        <option value="1" selected>1 dia</option>
                                        <option value="7">7 dias</option>
                                        <option value="15">15 dias</option>
                                        <option value="30">30 dias</option>
                                        <option value="90">3 meses</option>
                                        <option value="180">6 meses</option>
                                        <option value="365">1 ano</option>

                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Gerar relatório</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                <!-- para cada despesa passada pelo controller... -->
                @foreach ($listDespesas as $despesa)
                <tr>
                    <!-- exibir dados da despesa.. -->
                    <td style="text-align: left;" class="col-md-3">{{ $despesa->categoria }}</td>
                    <td style="text-align: center;" class="col-md-2">{{ $despesa->data }}</td>
                    <td id="valor_despesa" style="text-align: right;" class="col-md-2">R$ {{ $despesa->valor }}</td>
                    <td style="text-align: left;" class="col-md-4">{{ $despesa->desc }}</td>

                    <!-- criar botoes de CRUD -->
                    <td class="col-md-1" style="text-align: center;">
                        <div class="action-buttons hstack gap-2">
                            <!-- criar botão visualizar -->
                            <a href="{{url("despesas/$despesa->id")}}" class="" data-rel="" title="" data-original-title="">
                                <button class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </a>
                            <!-- criar botão editar -->
                            <a href="{{"/despesas/editar/$despesa->id"}}" data-toggle="" class="" style="" data-original-title="" title="">
                                <button class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-pen"></i></button>
                            </a>
                            <!--apagar-->
                            <form action="{{"/despesas/excluir/$despesa->id"}}" method="POST">
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

<footer class="container">
</footer>
@endsection('content')