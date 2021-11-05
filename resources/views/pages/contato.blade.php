@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <p>{{$desc}}</p>
    @if(count($contatos) > 0)
    <ul>
        @foreach($contatos as $o)
            <li>{{$o}}</li>
        @endforeach
    </ul>
    @endif
@endsection('content')