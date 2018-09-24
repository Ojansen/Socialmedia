@extends('layouts.app')
@section('content')
    <div id="poll">
        <h3>{{$post->poll_naam}}</h3>
        <form method="post" action="{{ route('votepoll',[$post])  }}">
            {{ csrf_field() }}
            {{ method_field('post') }}
            Yes:
            <input type="radio" name="vote1" value="0">
            <br>No:
            <input type="radio" name="vote1" value="1">
            <input type="hidden" name="post_id" value="{{$post->Post_id}}">
            <input type="submit" name="voteKnop" value="Vote now!">
        </form>
    </div>
@endsection