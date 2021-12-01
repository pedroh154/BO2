@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <h1 class="container-fluid">@if($editavel == false) Detalhes da despesa @else Editar despesa @endif</h1>

    @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $erro)
                {{$erro}}<br>
            @endforeach
        </div>
    @endif

     <!-- FORMULÁRIO DE DETALHES -->
    @if($editavel == false)
        <form class="container-fluid" action="/despesas">
            @csrf
            <div class="input-group mb-3">
            
                <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
                <select disabled class="form-select" id="categoria" name="categoria" required>
                    <option value="{{$despesa->categoria}}" selected>{{$despesa->categoria}}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input disabled type="date" class="form-control" id="data" name="data" required value="{{$despesa->data}}">
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input disabled type="number" step="0.01"  class="form-control" id="valor" required name="valor" value="{{number_format($despesa->valor, 2)}}">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Descrição</label>
                <textarea disabled class="form-control" id="desc" name="desc" rows="3">{{$despesa->desc}}</textarea>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">@if($editavel == false)Fechar @else Confirmar @endif</button>
            </div>
        </form>
        
    <!-- FORMULÁRIO DE EDIT -->
    @else
        <form class="container-fluid" action={{"/despesas/atualizar/$despesa->id"}}>
            @method('PUT')
            @csrf
            <div class="input-group mb-3">
                <!--VER IDS-->
                <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
                <select class="form-select" id="categoria" name="categoria" required>
                    @foreach($listCategorias as $categoria)
                        @if($categoria == $despesa->categoria)
                            <option value="{{$categoria}}" selected>{{$categoria}}</option>
                        @else
                            <option value="{{$categoria}}">{{$categoria}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" name="data" required value="{{$despesa->data}}">
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" step="0.01"  class="form-control" id="valor" required name="valor" value="{{number_format($despesa->valor, 2)}}">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Descrição</label>
                <textarea class="form-control" id="desc" name="desc" rows="3">{{$despesa->desc}}</textarea>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">@if($editavel == false)Fechar @else Confirmar @endif</button>
            </div>
        </form>
    @endif

</div>

<footer class="container">
</footer>

@endsection('content')