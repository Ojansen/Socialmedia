@extends('layouts.app')

@section('layout')
<style type="text/css">  
    html, body {
        height: 100%;
        background-color: {{ $profile_settings->first()->Body_Color }};
        background-image: none;
    }
    .bio {
        color:{{ $profile_settings->first()->Font_Color }};
    }
    .title {
        color:{{ $profile_settings->first()->Font_Color }};
    }
    .headerpic {
        background: url('data:image/jpg;base64,{{ $profile_settings->first()->Header }}');
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        height: 400px;
        position: absolute;
        margin-top: -22px;
    }
    </style>
@endsection

@section('content')

<div class="headerpic"></div>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12 headerplace">
            <div class="col-md-12 pfimage">
                <img src="data:image/jpg;base64,{{$profile_settings->first()->Profile_picture}}" alt="Profile_picture" class="img-circle" width="114px" height="114px">
            </div>
            <div class="col-md-12 title">
                <h1>{{$profile_settings->first()->Title}}</h1>
            </div>
            <div class="col-md-12 bio">
                <p>{{$profile_settings->first()->Bio}}</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">  
        <div class="container">
            <div class="grid">
              @foreach ($post as $posts)
                @if ($posts->Post_type == 'Foto')
                <div class="card grid-item grid-item--width1 grid-item--height5">
                    <h3 class="card-head">
                        <img src='data:image/x-icon;base64,{{$posts->user->profile->Profile_picture}}'>
                        <a href="{{ url('Profiel') }}/{{ $posts->user->nickname}}">{{$posts->user->nickname}}</a>
                    </h3>
                        <img src="data:image/x-icon;base64,{{$posts->Foto}}" width="300px" height="auto">
                    <div class="content">
                        <p class="Text_body">{{$posts->Text_body}}</p>
                        <div class="content-options">
                            <i class="fa fa-lg fa-heart-o" aria-hidden="true"></i>
                            <i class="fa fa-lg fa-comment-o" aria-hidden="true"></i>
                            <span>likes {{ $posts->likes->count()}}</span>
                        </div>
                    </div>
                </div>
                @endif
                
                @if ($posts->Post_type == 'Tekst')
                <div class="card grid-item grid-item--width1 grid-item--height2">
                    <h3 class="card-head">
                        <img src='data:image/x-icon;base64,{{$posts->user->profile->Profile_picture}}'>
                        <a href="{{ url('Profiel') }}/{{ $posts->user->nickname}}">{{$posts->user->nickname}}</a>
                    </h3>
                    <div class="content">
                        <h1 class="Text_title">{{$posts->Text_title}}</h1>
                        <p class="Text_body">{{$posts->Text_body}}</p>
                        <div class="content-options">
                            <i class="fa fa-lg fa-heart-o" aria-hidden="true"></i>
                            <i class="fa fa-lg fa-comment-o" aria-hidden="true"></i>
                            <span>likes {{ $posts->likes->count()}}</span>
                        </div>
                    </div>
                </div>
                @endif

                @if ($posts->Post_type == 'Citaat')
                <div class="card grid-item grid-item--width1 grid-item--height2">
                    <h3 class="card-head">
                        <img src='data:image/x-icon;base64,{{$posts->user->profile->Profile_picture}}'>
                        <a href="{{ url('Profiel') }}/{{ $posts->user->nickname}}">{{$posts->user->nickname}}</a>
                    </h3>
                    <div class="content">
                        <blockquote class="blockquote">{{ $posts->Text_title }}<br><br>
                        <p> - <i>{{ $posts->Text_body }}</i></p></blockquote>
                        <div class="content-options">
                            <i class="fa fa-lg fa-heart-o" aria-hidden="true"></i>
                            <i class="fa fa-lg fa-comment-o" aria-hidden="true"></i>
                            <span>likes {{ $posts->likes->count()}}</span>
                        </div>
                    </div>
                </div>
                @endif
              @endforeach
            </div>
        </div>
    </div>
</div>
@endsection