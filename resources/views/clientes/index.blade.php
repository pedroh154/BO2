@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <div class="container-fluid">
        <h1>Clientes</h1>
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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="/clientes/novocliente" role="button">Cadastrar cliente</a>
        </div> <br>
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead>
                <tr style="text-align: center;">
                    <th style="width: 150px;" scope="col">Nome</th>
                    <th style="width: 70px;" scope="col">Telefone</th>
                    <th style="width: 100px;" scope="col">Endereço</th>
                    <th style="width: 75px;" scope="col">Cidade</th>
                    <th></Th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listClientes as $cliente)
                <tr>
                    <td style="text-align: left;">{{ $cliente->nome }}</td>
                    </td>
                    <td style="text-align: left;">{{ $cliente->fone }}</td>
                    </td>
                    <td style="text-align: left;">{{$cliente->endereco}}</td>
                    </td>
                    <td style="text-align: left;">{{ $cliente->cidade_id }}</td>
                    </td>
                    <td class="col-md-1" style="text-align: center;">
                        <div class="action-buttons hstack gap-2">
                            <!-- criar botão visualizar -->
                            <a href="{{url("clientes/$cliente->id")}}" class="" data-rel="" title="" data-original-title="">
                                <button class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-file-lines"></i></button>
                            </a>
                            <!-- criar botão editar -->
                            <a href="{{"/clientes/editar/$cliente->id"}}" data-toggle="" class="" style="" data-original-title="" title="">
                                <button class="btn btn-info btn-sm" type="submit"><i class="fa-solid fa-pen"></i></button>
                            </a>
                            <!--apagar-->
                            <form action="{{"/clientes/excluir/$cliente->id"}}" method="POST">
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
</a> <br>
<footer class="container">
</footer>
@endsection('content')