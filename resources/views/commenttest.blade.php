@extends('layouts.app')
@section('content')
<div style="border: 1px orange dashed">
    POST
{{$post->Post_id}}
{{$post->Text_title}}
    {{--<a href="{{route('postshow',[$post->Post)])}}">thepost</a>--}}
</div>
<div style="border: solid green 1px">
    Comments<br>
    <br>
    @foreach($comments as $comment)
        {{$comment->Comment}}
    <br>
        <a href="{{route('comment.show.update',[$comment])}}">Aanpassen</a>
        <a href="{{route('comment.delete',[$comment])}}">Verwijderen</a>
    <br>
        -------------------------------------------
        <br>
        <br>
        @endforeach
</div>
<form method="post" action="{{route('comment.add')}}">
    {{ csrf_field() }}
    <input type="hidden" name="post_id" value="{{ $post->Post_id }}">
    <input type="text" placeholder="Type here your Comment MotherF***er" name="comment" style="width:300px;">
    <input type="submit">
</form>
@endsection
