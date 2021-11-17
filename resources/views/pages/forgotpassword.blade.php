@extends('layouts.app')

@section('content')

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Projeto BO2 - Esqueci a senha</title>



<!-- Custom styles for this template-->


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Esqueceu sua senha?</h1>
                                        <p class="mb-4 ">Sem problemas, isso acontece. Basta inserir seu endereço de e-mail abaixo
                                            e enviaremos um link para redefinir sua senha!</p>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <!--REVER IDS-->
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="E-mail">
                                        </div>
                                        <a href="/login" class="btn btn-primary btn-user btn-block">
                                            Redefinir senha
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/register">Crie uma conta!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/login">Já possui uma conta? Login!</a>
                                    </div>
                                </div>
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


@endsection('content')