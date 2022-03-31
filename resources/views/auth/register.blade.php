<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/sb-admin-2.min.css') }}">

    <title>Projeto BO2 - Registrar</title>
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

                            @if(isset($errors) && count($errors)>0)
                                 <div class="text-center mt-4 mb-4 p-2 alert-danger">
                                    @foreach($errors->all() as $erro)
                                        {{$erro}}<br>
                                    @endforeach
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}" autocomplete="new-password">
                            @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input oninvalid="this.setCustomValidity('O Nome é obrigatório')" oninput="setCustomValidity('')" autocomplete="new-password" type="text" class="form-control @error('name') is-invalid @enderror form-control-user " value="{{ old('name') }}" name="nome" id="nome" placeholder="Nome completo" required autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <input oninvalid="this.setCustomValidity('O E-mail é obrigatório')" oninput="setCustomValidity('')" type="email" autocomplete="new-password" class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" required placeholder="E-mail">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input oninvalid="this.setCustomValidity('A senha é obrigatória')" oninput="setCustomValidity('')" type="password" autocomplete="new-password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Senha">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input oninvalid="this.setCustomValidity('Confirme sua senha')" oninput="setCustomValidity('')" type="password" class="form-control form-control-user" id="password-confirm" name="password_confirmation" placeholder="Confirmar senha" required >
                                    </div>
                                </div>
                                <hr> 
                                <div class="text-center">
                                    <h2 class="h4 text-gray-900 mb-4">Credenciais SSW</h2>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0"> 

                                        <!--     REVER IDS DE SENHA         -->
                                        <input type="text" class="form-control form-control-user" id="ssw_dom" placeholder="SSW Domínio" name="ssw_dom">
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user" id="ssw_cpf" placeholder="SSW CPF" name="ssw_cpf">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="ssw_usuario" placeholder="SSW Usuário" name="ssw_usuario">
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control form-control-user" id="ssw_senha" placeholder="SSW Senha" name="ssw_senha">
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




