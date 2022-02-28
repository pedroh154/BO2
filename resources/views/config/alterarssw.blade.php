@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<!-- <div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->
<!--<h1></h1>-->
<!--<p style="color: #FFFFFF;"></p>-->

<!--<table class="table table-striped table-hover table-bordered caption-top" >-->

<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">



    <div class="container ">

        <div class="card o-hidden border-0 shadow-lg my-5 col-6 ">
            <div class="card-body p-0 " >
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="">
                        <div class="p-5">
                            <div class="text-center">
                                <!--{{ __('Register') }}-->
                                <h1 class="h4 text-gray-900 mb-4">Alterar credenciais SSW</h1>
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
                                    <div class="col-sm-5 mb-3 mb-sm-0">

                                        <!--     REVER IDS DE SENHA         -->
                                        <input type="text" class="form-control form-control-user" id="ssw_dom" placeholder="SSW Domínio"  name="ssw_dom">
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user" id="ssw_cpf" placeholder="SSW CPF"  name="ssw_cpf">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="ssw_usuario" placeholder="SSW Usuário"  name="ssw_usuario">
                                    </div>

                                </div>

                                <hr>
                         
                                <div class="form-group text-center">
                                    
                                    <a class="btn btn-primary col-sm-6 mb-3 mb-sm-0" href="/user/config/alterarssw" role="button">Alterar</a>
                                    <a class="btn btn-secondary col-sm-5 mb-3 mb-sm-0" href="/user/config" role="button">Cancelar</a>
    
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