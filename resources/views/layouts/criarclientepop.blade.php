<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{ URL::asset('css/sb-admin-2.min.css') }}">
    <link href="{{ URL::asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">


    <title>Projeto BO2</title>

</head>

<body>
    <div class="modal-header">
        <h5 class="modal-title">Criar cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div id="content-wrapper" class="d-flex flex-column " style="background-color: #FFFFFF;">
            <h1 class="container-fluid" style="text-align: left;">Cadastrar cliente</h1>

            <h4 class="container-fluid" style="text-align: left;">Forneça os dados abaixo:</h4> <br>
            <form class="row g-3" action="/cliente-enviar" method="POST">
                @csrf
                <div class="col-md-8">
                    <!--VER IDS-->
                    <label for="nomecliente" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nomecliente" required name="nomecliente">
                </div>
                <div class="col-md-4">
                    <label for="fonecliente" class="form-label">Telefone</label>
                    <input type="number" class="form-control" id="fonecliente" required name="fonecliente">
                </div>
                <div class="col-md-4">
                    <label for="cepcliente" class="form-label">CEP</label>
                    <input type="number" class="form-control" id="cepcliente" required name="cepcliente">
                </div>
                <div class="col-md-8">
                    <label for="enderecocliente" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="enderecocliente" name="enderecocliente">
                </div>
                <div class="col-md-12">
                    <label for="cadastronacionalcliente" class="form-label">CPF/CNPJ</label>
                    <input type="text" class="form-control" id="cadastronacionalcliente" name="cadastronacionalcliente">
                </div>
                <div class="col-md-12">
                    <label for="obscliente" class="form-label">Descrição</label>
                    <textarea class="form-control" id="obscliente" name="obscliente" rows="2"></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>

    </div>
</body>