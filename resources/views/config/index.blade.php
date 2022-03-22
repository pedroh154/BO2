@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-config-image "></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <!--{{ __('Register') }}-->
                                <h1 class="h4 text-gray-900 mb-4">Configurações</h1>
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
                                        <input autocomplete="new-password" type="text" class="form-control @error('name') is-invalid @enderror form-control-user " value="{{ $user->nome }}" name="nome" id="nome" placeholder="Nome completo" disabled>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <input type="email" autocomplete="new-password" class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ $user->email }}" id="email" name="email" disabled placeholder="E-mail">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <a class="btn btn-primary btn-user btn-block" href="/user/config/alterarsenha" role="alterarsenha">Alterar senha da conta</a>


                                <hr>
                                <div class="text-center">
                                    <h2 class="h4 text-gray-900 mb-4">Credenciais SSW</h2>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0">

                                        <!--     REVER IDS DE SENHA         -->
                                        <input type="text" class="form-control form-control-user" id="ssw_dom" placeholder="SSW Domínio" disabled name="ssw_dom">
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user" id="ssw_cpf" placeholder="SSW CPF" disabled name="ssw_cpf">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="ssw_usuario" placeholder="SSW Usuário" disabled name="ssw_usuario">
                                    </div>

                                </div>

                                <div class="form-group text-center">
                                    
                                <a class="btn btn-primary col-sm-6 mb-3 mb-sm-0" href="/user/config/alterarssw" role="button">Alterar credenciais SSW</a>
                                <a class="btn btn-danger col-sm-5 mb-3 mb-sm-0" href="#" role="button">Apagar dados SSW</a>

                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
    <!--<a href="/novocontato" >
    <input type="submit" value="" class="btn btn-outline-dark" style="color: #FFFFFF;">-->

    <!--https://stackoverflow.com/questions/2150238/php-variable-in-html-no-other-way-than-php-echo-var-->
    </a> <br>
    <footer class="container">
        <!-- <a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
    </footer>
    @endsection('content')