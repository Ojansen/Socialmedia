@extends('layouts.app')
@section('content')
    <h1>Newsfeed</h1>
    <a href="/Newsfeed/newsfeedPage">Likes van vrienden</a>

    @foreach($data as $post)
            @foreach($post["Posts"] as $posts)
                <div style="padding:10px;border:dotted;margin:auto; width:400px;">
            {{$post["User"]->first_name}}
            <b>Aangemaakt op:</b>
            {{$post["User"]->created_at}}

                <h2>{{$posts->Text_body}}</h2>
                <img src="data:image/x-icon;base64,{{$posts->Foto1}}" width="300px" height="auto">
                    <hr color="black">
                </div>
            @endforeach
    @endforeach
@endsection


















































