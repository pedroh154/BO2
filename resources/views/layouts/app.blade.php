<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.full.min.js" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
        <link rel="stylesheet" href="{{ URL::asset('css/sb-admin-2.min.css') }}">

        <title>Projeto BO2</title>
    </head>

    <body id="page-top">
        <div id="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> 

                <!-- Sidebar -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
                    <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-dolly"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3"><img src="{{ URL::asset('img/logo.png') }}" class="img-fluid" alt="logo"></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <a class="nav-link" href="/home">
                        <i class="fas fa-table"></i>
                            <span>Principal</span></a>
                    </li>
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Opções
                </div>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-book"></i>
                                <span>CT-es</span>
                        </a>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Opções:</h6>
                                <a class="collapse-item" href="/ctes">Visualizar CT-es</a>
                                <a class="collapse-item" href="/ctes/novocte">Cadastrar CT-e</a>
                                <a class="collapse-item" href="/clientes">Visualizar clientes</a>
                                <a class="collapse-item" href="/clientes/novocliente">Cadastrar cliente</a>
                            </div>
                        </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-address-book"></i>
                        <span>Contatos</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Opções:</h6>
                            <a class="collapse-item" href="/contatos">Visualizar contatos</a>
                            <a class="collapse-item" href="/contatos/novocontato">Cadastrar contato</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-cash-register"></i>
                        <span>Despesas</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Opções:</h6>
                            <a class="collapse-item" href="/despesas">Visualizar despesas</a>
                            <a class="collapse-item" href="/despesas/novadespesa">Cadastrar despesa</a>
                        <!--  <a class="collapse-item" href="">Animations</a>
                            <a class="collapse-item" href="">Other</a>-->
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Adicionais
                </div>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank">
                    <i class="fas fa-globe"></i>
                        <span>SSW</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/logout">
                        <i class="fas fa-sign-out-alt"></i></i>
                        <span>Logout</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>

            <div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f5f8;">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $username }}</span>
                                <img class="img-profile rounded-circle" src="https://source.unsplash.com/Qb7D1xw28Co/150x150">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/user/config">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configurações
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                
                @yield('content')

            </div>
        </div>

        <br>
        <!-- Bootstrap core JavaScript-->
        <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ URL::asset('js/sb-admin-2.min.js') }}"></script>
    </body>

    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
     
          $( "#cidade_remetente_id" ).select2({
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

    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
     
          $( "#cidade_remetente_id" ).select2({
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
    
    
    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
     
          $( "#cidade_destinataria_id" ).select2({
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

    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
     
          $( "#cidade_id" ).select2({
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

    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
    
        $( "#destinatario_id" ).select2({
            ajax: { 
            url: "/getClientes",
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

<script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

    $( "#remetente_id" ).select2({
        ajax: { 
        url: "/getClientes",
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

<script type="text/javascript">
    $("#criarcteform").submit(function() {
        $("#valor_cte").unmask();
        $("#valor_nf").unmask();
        $("#valor").unmask();
    });

    $("#criarcontatoform").submit(function() {
        $("#fone").unmask();
    });

    $("#criarclienteform").submit(function() {
        $("#cadastro_nacional").unmask();
        $("#cep").unmask();
        $("#fone").unmask();
    });

    $("#criardespesaform").submit(function() {
        $("#valor").unmask();
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('#cep').mask('00000-000');
        $('#fone').mask('(99) 99999-9999');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');

        

        $("#cadastro_nacional").keydown(function(){
            try {
                $("#cadastro_nacional").unmask();
            } catch (e) {}

            var tamanho = $("#cadastro_nacional").val().length;

            if(tamanho < 11){
                $("#cadastro_nacional").mask("999.999.999-99");
            } else {
                $("#cadastro_nacional").mask("99.999.999/9999-99");
            }

            // ajustando foco
            var elem = this;
            setTimeout(function(){
                // mudo a posição do seletor
                elem.selectionStart = elem.selectionEnd = 10000;
            }, 0);
            // reaplico o valor para mudar o foco
            var currentValue = $(this).val();
            $(this).val('');
            $(this).val(currentValue);
        });

        $('.cnpj').mask('00.000.000/0000-00', {reverse: true}, {removeMaskOnSubmit: true});
        $('#valor_nf').mask('000.000,00', {reverse: true}, {removeMaskOnSubmit: true});
        $('#valor_cte').mask('000.000,00', {reverse: true}, {removeMaskOnSubmit: true});

             //i = numero do paginate
        for( i =0; i< 15 ; i++){ 
            $('#valor_nf'+i).mask('000.000,00', {reverse: true}, {removeMaskOnSubmit: true});
        }
       
        //i = numero do paginate
        for( i =0; i< 15 ; i++){ 
            $('#valor_nf'+i).mask('000.000,00', {reverse: true}, {removeMaskOnSubmit: true});
        }

        //i = numero do paginate
        for( i =0; i< 15 ; i++){ 
            $('#valor_cte'+i).mask('000.000,00', {reverse: true}, {removeMaskOnSubmit: true});
        }


        //i = numero do paginate
        for( i =0; i< 15 ; i++){ 
            $('#valor_despesa'+i).mask('000.000,00', {reverse: true}, {removeMaskOnSubmit: true});
        }

                //i = numero do paginate
        for( i =0; i< 15 ; i++){ 
            $('#fone'+i).mask('(99) 99999-9999');
        }
            
        $('#valor').mask('000.000,00', {reverse: true}, {removeMaskOnSubmit: true});
        $('.money2').mask("#.##0,00", {reverse: true});
        $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
            'Z': {
                pattern: /[0-9]/, optional: true
            }
            }
        });
        $('.ip_address').mask('099.099.099.099');
        $('.percent').mask('##0,00%', {reverse: true});
        $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
        $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
        $('.fallback').mask("00r00r0000", {
            translation: {
                'r': {
                pattern: /[\/]/,
                fallback: '/'
                },
                placeholder: "__/__/____"
            }
            });
        $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
    });
</script>

</html>