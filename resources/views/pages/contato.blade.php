@extends('layouts.app')

@section('content')

<style>
    table,tr, th {
        border: 1px solid black;
    }

    table,tr,td {
        border: 1px solid black;
    }
</style>
<h1 style="color: #FFFFFF;">{{$title}}</h1>
<!--<p style="color: #FFFFFF;">{{$desc}}</p>-->
<table style="color: #FFFFFF;">
    <tr>
        <th>Contatos</th>
    </tr>
    
    
    
    <tr>
        <td>
            @if(count($contatos) > 0)
            <ul style="list-style-type: circle;">
                @foreach($contatos as $o)
                <li style="color: #FFFFFF;">{{$o}}</li>
                @endforeach
        </td>
        </ul>
    </tr>

</table>
<a href="/criarcontato" style="color: white;">
    <input type="submit" value="{{$desc}}">
    <!--https://stackoverflow.com/questions/2150238/php-variable-in-html-no-other-way-than-php-echo-var-->
    </a> <br>
@endif
@endsection('content')