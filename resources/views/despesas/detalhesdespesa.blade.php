@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<!--<div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->

<!---->

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">Detalhes despesa</h1>

    @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $erro)
                {{$erro}}<br>
            @endforeach
        </div>
    @endif
    <h4 class="container-fluid">Forneça os dados abaixo:</h4> <br>
    <form class="container-fluid" action="/despesas">
        @csrf
        <div class="input-group mb-3">
            <!--VER IDS-->
            <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
            <select disabled class="form-select" id="categoria" name="categoria" required>
                <option value="{{$despesa->categoria}}" selected>{{$despesa->categoria}}</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input disabled type="date" class="form-control" id="data" name="data" required value="{{$despesa->data}}"">
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input disabled type="number" step="0.01"  class="form-control" id="valor" required placeholder="R$" name="valor" value="{{$despesa->valor}}"">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Descrição</label>
            <textarea disabled class="form-control" id="desc" name="desc" rows="3" value="{{$despesa->desc}}""></textarea>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary">Fechar</button>
        </div>
    </form>
</div>





<footer class="container">
    <!--<a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
</footer>
@endsection('content')