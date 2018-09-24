@extends('layouts.app')
@section('content')
<link href="/css/zoekFunctie.css" rel="stylesheet">
<script src="/js/zoekPersonen.js"></script>
<input type="text" id="myInput" onkeyup="zoekVriend()" placeholder="Vind een vriend" title="Typ hier de naam">
    <ul id="myUL">
        @foreach($users as $user)
            <li class="li" style="display: none;">
                <a href="#">
                    {{$user->nickname}}
                </a>
            </li>
        @endforeach
    </ul>
@endsection