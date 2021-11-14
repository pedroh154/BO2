<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <a href="/" style="color: white;">Página Inicial</a> |  
    <a href="contato" style="color: white;">  Contatos</a>
      
    <title>{{config('app.name', 'BO2')}}</title>
</head>

<body style="background-color: #383838">

    @yield('content')
    <br>
</body>
<footer><a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: white;">SSW</a> </footer>
</html>