@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">Editar CT-e</h1>
    @if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
        {{$erro}}<br>
        @endforeach
    </div>
    @endif
    <div class="container-fluid">
        <form class="row g-3" action={{ "/ctes/atualizar/$cte->id" }}>
            @method('PUT')
            @csrf
            <div class="col-md-4">
                <label for="numcte" class="form-label">Número CT-e</label>
                <input type="number" class="form-control" name="numero_cte" id="numero_cte" value="{{$cte->numero_cte}}">
            </div>
            <div class="col-md-4">
                <label for="valorcte" class="form-label">Valor CT-e</label>
                <input type="number" class="form-control" name="valor_cte" id="valor_cte" placeholder="R$" value="{{($cte->valor_cte)}}">
            </div>
            <div class="col-md-4">
                <label for="qtdevol" class="form-label">Quantidade de volumes</label>
                <input type="number" class="form-control" name="volume" id="volume" value="{{$cte->volume}}">
            </div>
            <div class="col-md-4">
                <label for="numnf" class="form-label">Número NF</label>
                <input type="number" class="form-control" name="numero_nf" id="numero_nf" value="{{$cte->numero_nf}}">
            </div>
            <div class="col-md-4">
                <label for="valornf" class="form-label">Valor NF</label>
                <input type="number" class="form-control" name="valor_nf" id="valor_nf" value="{{$cte->valor_nf}}">
            </div>
            <div class="col-md-4">
                <label for="data" class="form-label">Data de chegada</label>
                <input type="date" class="form-control" name="data_chegada" id="data_chegada" value="{{$cte->data_chegada}}">
            </div>
            <div class="col-md-4">
                <label for="cidade_remetente_id" class="form-label">Cidade remetente</label>
                <br>
                <select id="cidade_remetente_id" name="cidade_remetente_id" style='width: 300px;'>
                    <option value={{$cidade_rem_nome->id}}>{{$cidade_rem_nome->name}} - {{$cidade_rem_nome->estado->abbr}}</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="cidade_destinataria_id" class="form-label">Cidade destinatária</label>
                <br>
                <select id="cidade_destinataria_id" name="cidade_destinataria_id" style='width: 300px;'>
                    <option value={{$cidade_dest_nome->id}}>{{$cidade_dest_nome->name}} - {{$cidade_dest_nome->estado->abbr}}</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="metodo" class="form-label">Situação</label>
                <select id="finalizado" name="finalizado" class="form-select">
                    @foreach($situacao as $tipo)
                        @if($tipo == 'CONCLUÍDO' && $cte->finalizado)
                            <option value="{{$tipo}}" selected>{{$tipo}}</option>
                        @elseif($tipo == 'ABERTO' && !$cte->finalizado)
                            <option value="{{$tipo}}" selected>{{$tipo}}</option>
                        @else
                            <option value="{{$tipo}}">{{$tipo}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label for="obscte" class="form-label">Observação</label>
                <textarea class="form-control" id="obs" name="obs" rows="2">{{$cte->obs}}</textarea>
            </div>
            <BR>

            <hr class="sidebar-divider">
            <h5> Clientes</h5>

            <div class="col-md-4">
                <label for="remetente_id" class="form-label">Cliente remetente</label>
                <br>
                <select id="remetente_id" name="remetente_id" style='width: 300px;'>
                    <option value={{$cliente_rem_nome->id}}>{{$cliente_rem_nome->nome}} - {{$cliente_rem_nome->cadastro_nacional}}</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="destinatario_id" class="form-label">Cliente destinatário</label>
                <br>
                <select id="destinatario_id" name="destinatario_id" style='width: 300px;'>
                    <option value={{$cliente_dest_nome->id}}>{{$cliente_dest_nome->nome}} - {{$cliente_dest_nome->cadastro_nacional}}</option>
                </select>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-secondary">Confirmar</button>
            </div>

        </form>
    </div>


    <footer class="container">
    </footer>

    @endsection('content')