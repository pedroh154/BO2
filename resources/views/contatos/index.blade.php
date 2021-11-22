@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

<!-- <div class="btn-group" role="group" aria-label="Basic example">
            <a href="/home" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Página Inicial</button></a>
            <a href="/contatos" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Contatos</button></a>
        </div>-->
<h1>{{$title}}</h1>
<!--<p style="color: #FFFFFF;">{{$desc}}</p>-->

<!--<table class="table table-striped table-hover table-bordered caption-top" >-->
<table class="table table-striped table-hover ">
    <thead>
        <tr class="table-active">
            <th scope="col" style="text-align: left;">Contatos</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <ul style="list-style-type: none;">
                <td>
                    @if(count($contatos) > 0)
                    @foreach($contatos as $o)
                    <li style="list-style-type: none;">{{$o}}</li>
                    @endforeach
                </td>
                @endif
            </ul>

        </tr>
    </tbody>

</table>
<!--<a href="/novocontato" >
    <input type="submit" value="{{$desc}}" class="btn btn-outline-dark" style="color: #FFFFFF;">-->

<!--https://stackoverflow.com/questions/2150238/php-variable-in-html-no-other-way-than-php-echo-var-->
</a> <br>
<footer class="container">
    <!-- <a href="https://sistema.ssw.inf.br/bin/ssw0422" target="_blank" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">SSW</button></a>
    <a href="/logout" style="color: #FFFFFF;"><button type="button" class="btn btn-primary">Logout</button></a>
-->
</footer>
@endsection('content')