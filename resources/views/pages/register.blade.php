@extends('layouts.app')

@section('content')

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projeto BO2 - Registro</title>
    <body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image "></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Crie uma conta!</h1>
                        </div>
                        <form class="user">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="Nome completo">
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="E-mail">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Senha">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Confirmar senha">
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                            <h2 class="h4 text-gray-900 mb-4">Credenciais SSW</h2>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">

                                <!--     REVER IDS DE SENHA         -->
                                    <input type="text" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="SSW Domínio">
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="SSW CPF">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="SSW Usuário">
                                </div>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="SSW Senha">
                                </div>
                            </div>
                            <a href="/login" class="btn btn-primary btn-user btn-block">
                                Criar conta
                            </a>
                          
                        </form>
                        
                        <hr>
                        
                        
                        <div class="text-center">
                            <a class="small" href="/login">Já possui uma conta? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
    
<script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    
    <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    
    <script src="{{ URL::asset('js/sb-admin-2.min.js') }}"></script>

</body>

</head>


@endsection('content')