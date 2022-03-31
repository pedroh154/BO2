@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">@if($editavel == false) Detalhes do contato @else Editar contato @endif</h1>

    @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $erro)
                {{$erro}}<br>
            @endforeach
        </div>
    @endif

    <!-- FORMULÁRIO DE DETALHES -->
    @if($editavel == false)
        <form class="container-fluid" action="/contatos">
            @csrf
            <div class="mb-3">
                <label for="nomecontato" class="form-label">Nome Completo</label>
                <input disabled type="text" class="form-control" id="nome" required name="nome" aria-describedby="emailHelp" value="{{$contato->nome}}">
            </div>
            <div class="mb-3">
                <label for="telefonecontato" class="form-label">Telefone</label>
                <input disabled type="number" class="form-control" id="fone" required name="fone" value="{{$contato->fone}}">
            </div>
            <div class="mb-3">
                <label for="enderecocontato" class="form-label">Endereço</label>
                <input disabled type="text" class="form-control" id="endereco" name="endereco" aria-describedby="emailHelp" value="{{$contato->endereco}}">
            </div>
            <div class="mb-3">
                <label for="descricaocontato" class="form-label">Descrição</label>
                <textarea disabled class="form-control" id="desc" name="desc" rows="3">{{$contato->desc}}</textarea>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">@if($editavel == false)Fechar @else Confirmar @endif</button>
            </div>
        </form>

    <!-- FORMULÁRIO DE EDIT -->
    @else
        <form id="editarcontatoform" class="container-fluid" action={{ "/contatos/atualizar/$contato->id" }}>
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nomecontato" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" required name="nome" aria-describedby="emailHelp" value="{{$contato->nome}}">
            </div>
            <div class="mb-3">
                <label for="telefonecontato" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="fone" required name="fone" value="{{$contato->fone}}">
            </div>
            <div class="mb-3">
                <label for="enderecocontato" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" aria-describedby="emailHelp" value="{{$contato->endereco}}">
            </div>
            <div class="mb-3">
                <label for="descricaocontato" class="form-label">Descrição</label>
                <textarea class="form-control" id="desc" name="desc" rows="3">{{$contato->desc}}</textarea>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">@if($editavel == false)Fechar @else Confirmar @endif</button>
            </div>
        </form>
    @endif
</div>





<footer class="container">
    <!--<a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
</footer>
@endsection('content')