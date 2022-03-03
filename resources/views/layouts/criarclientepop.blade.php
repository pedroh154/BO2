<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{ URL::asset('css/sb-admin-2.min.css') }}">
    <link href="{{ URL::asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.full.min.js" defer></script>

    <title>Projeto BO2</title>
</head>

<body>
    <div class="modal-header">
        <h5 class="modal-title">Criar cliente</h5>

        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div id="content-wrapper" class="d-flex flex-column " style="background-color: #FFFFFF;">
            <h1 class="container-fluid" style="text-align: left;">Cadastrar cliente</h1>
            <h4 class="container-fluid" style="text-align: left;">Forneça os dados abaixo:</h4> <br>
            <form class="row g-3" action="/cliente-enviar" method="POST" autocomplete="off">
                @csrf
                <div class="col-md-7">
                    <!--VER IDS-->
                    <label for="nomecliente" class="form-label">Nome Completo</label>
                    <input type="text" maxlength="200" class="form-control" id="nome" required name="nome">
                </div>
                <div class="col-md-5">
                    <label for="fonecliente" class="form-label">Telefone</label>
                    <input type="text" maxlength="15" class="form-control" id="fone" required name="fone" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
                </div>
                <div class="col-md-4">
                    <label for="cepcliente" class="form-label">CEP</label>
                    <input type="text" maxlength="8" class="form-control" id="cep" required name="cep" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
                </div>
                <div class="col-md-8">
                    <label for="enderecocliente" class="form-label">Endereço</label>
                    <input type="text" maxlength="150" class="form-control" id="endereco" name="endereco">
                </div>
                <div class="col-md-7">
                    <label for="cadastronacionalcliente" class="form-label">CPF/CNPJ</label>
                    <input type="text" maxlength="14" class="form-control" id="cadastro_nacional" name="cadastro_nacional" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
                </div>
                <div class="col-md-4">
                    <label for="cidade_remetente_id" class="form-label">Cidade remetente</label>
                    <br>
                    <select id='cidade_remetente' style='width: 150px;'>
                        <option value='0'>Cidade remetente</option>
                    </select>
                </div>
                
                <div class="col-md-12">
                    <label for="obscliente" class="form-label">Observações</label>
                    <textarea class="form-control" maxlength="280" id="obs" name="obs" rows="2"></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
     
          $( "#cidade_remetente" ).select2({
             ajax: { 
               url: "/getCidades",
               type: "post",
               dataType: 'json',
               delay: 500,
               data: function (params) {
                 return {
                    _token: CSRF_TOKEN,
                    search: params.term // search term
                 };
               },
               processResults: function (response) {
                 return {
                   results: response
                 };
               },
               cache: true
             }
     
          });
     
        });
    </script>
</body>