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
    </head>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image "></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                                          <!--{{ __('Register') }}-->
                                <h1 class="h4 text-gray-900 mb-4">Crie uma conta!</h1>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror form-control-user " value="{{ old('name') }}" name="name" id="name" placeholder="Nome completo" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" required autocomplete="email" placeholder="E-mail">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="Senha">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password-confirm" name="password_confirmation" placeholder="Confirmar senha" required autocomplete="new-password">
                                    </div>
                                </div>
                                <hr> 
                                <div class="text-center">
                                    <h2 class="h4 text-gray-900 mb-4">Credenciais SSW</h2>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0"> 

                                        <!--     REVER IDS DE SENHA         -->
                                        <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="SSW Domínio">
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="SSW CPF">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="SSW Usuário">
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="SSW Senha">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Criar conta') }}
                                            </button>

                            </form>

                            <hr>


                            <div class="text-center">
                                <a  href="/login">Já possui uma conta? Login!</a>
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