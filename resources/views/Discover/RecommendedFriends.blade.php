@extends('layouts.app')
@section('content')
@php($getal=0)
@if($random->isEmpty())
    Er zijn geen voorstellen
@else
@foreach($random as $item=>$value)

    @php($user = \App\User::find($item))
        <a href="{{'/'.$user->nickname}}">{{$user->nickname}}</a> <br>
    {{$user->nickname}}wordt door {{count($value)}} van je vrienden gevolgd <br> <br>
    <form action="/Follow/{{$user->id}}">
        <input type="submit" value="Follow" />
    </form>


@endforeach
@endif
    @endsection
        {{--{{route('Follow',['id' => $user->id] )}}--}}