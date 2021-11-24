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
        <h1>Contatos</h1>
        @csrf
        @method('DELETE')
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="/contatos/novocontato" role="button">Cadastrar contato</a>
        </div> <br>
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead>
                <tr style="text-align: center;">
                    <th style="width: 150px;" scope="col">Nome</th>
                    <th style="width: 70px;" scope="col">Telefone</th>
                    <th style="width: 100px;" scope="col">Endereço</th>
                    <th style="width: 75px;" scope="col">Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listContatos as $contato)
                @if($contato->type == 'Nome')
                <tr>
                    <td style="text-align: left;">{{ $contato->nome }}</td>
                    </td>


                </tr>
                @endif
                @endforeach


            </tbody>

        </table>
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