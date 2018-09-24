@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">  
            <div class="col-md-12">

                <div class="newpost" id="newpost">
                    <div class="post" id="tekst">
                        <i class="fa fa-font fa-3x" aria-hidden="true"></i>
                        <p>Tekst</p>
                    </div>
                    <div class="post" id="foto">
                        <i class="fa fa-camera fa-3x" aria-hidden="true"></i>
                        <p>Foto</p>
                    </div>
                    <div class="post" id="citaat">
                        <i class="fa fa-quote-left fa-3x" aria-hidden="true"></i>
                        <p>Citaat</p>
                    </div>
                </div>
                <div class="newpost" id="newpost">
                    <div class="postnew" id="newtekst" style="display: none;">
                        <span id="close" class="btn btn-default">Sluiten</span>
                        <form method="post" action="{{ route('posttext')  }}" enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            <div class="form-group form-inline">
                                <input type="text" name="Text_title" placeholder="Title" class="form-control"><br>
                                <textarea name="Text_body" class="form-control" rows="3" placeholder="Schrijf een onderschrift"></textarea> <br>
                                <input type="submit" name="submit_post" value="Uploaden" class="btn btn-default" role="button">
                            </div>
                        </form>
                    </div> 
                
                    <div class="postnew" id="newfoto" style="display: none;">
                        <span id="close" class="btn btn-default">Sluiten</span>
                        <form method="post" action="{{ route('postfoto')  }}" enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            <div class="form-group form-inline">
                                <input type="file" name="Foto" multiple="multiple" class="btn"><br>
                                <textarea name="Text_body" class="form-control" rows="3" placeholder="Schrijf een onderschrift"></textarea> <br>
                                <input type="submit" name="submit_post" value="Uploaden" class="btn btn-default" role="button">
                            </div>
                        </form>
                    </div>

                    <div class="postnew" id="newcitaat" style="display: none;">
                        <span id="close" class="btn btn-default">Sluiten</span>
                        <form method="post" action="{{ route('postcitaat')  }}" enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            <div class="form-group form-inline">
                                <textarea name="citaat" class="form-control" rows="3" placeholder="Citaat"></textarea><br>
                                <span>From - </span><input type="text" name="Text_body" class="form-control"><br>
                                <input type="submit" name="submit_post" value="Uploaden" class="btn btn-default" role="button">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
                
            <div class="col-md-6"> 
                @foreach ($post as $posts)
                @if ($posts->Post_type == 'Tekst')
                <div class="card">
                    <h3 class="card-head">
                        <img src='data:image/x-icon;base64,{{$posts->user->profile->Profile_picture}}'>
                        <a href="{{ url('Profiel') }}/{{ $posts->user->nickname}}">{{$posts->user->nickname}}</a>
                    </h3>
                    <div class="content">
                        <h1 class="Text_title">{{$posts->Text_title}}</h1>
                        <p class="Text_body">{{$posts->Text_body}}</p>
                        <div class="content-options">
                            <a href="{{ route('likes', $posts ) }}"><i class="far fa-heart fa-lg" id="like" style="color: red"></i></a>   
                            <i class="fas fa-lg fa-comment" id="comment_text{{ $posts->Post_id }}"  onclick="show('{{ $posts->Post_id }}')"></i>
                            <span>likes {{ $posts->likes->count()}}</span> - 
                            <span>Reacties {{ $posts->comments->count() }}</span>
                        </div>
                    </div>
                    <div class="comments">
                        <div id="show_comment_text{{ $posts->Post_id }}" style="display: none;">
                            <form method="post" class="newcomment form-inline" action="{{ route('comment_add')}} ">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                <input type="hidden" name="post_id" value="{{ $posts->Post_id }}" id="post_id">
                                <input type="text" placeholder="Comment" name="comment" class="form-control">
                                <input type="submit" value="Plaatsen" class="btn btn-success">
                            </form>
                            <div> 
                                @foreach ($posts->comments as $comment)
                                    <div class="comment">
                                        <img src='data:image/x-icon;base64,{{$posts->user->profile->Profile_picture}}'>
                                        <a href="{{ url('Profiel') }}/{{ $comment->user->nickname}}">{{$comment->user->nickname}}</a>
                                        <span>{{$comment->Comment}}</span>
                                        <span style="float: right;">{{$comment->created_at }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if ($posts->Post_type == 'Citaat')
                <div class="card">
                    <h3 class="card-head">
                        <img src='data:image/x-icon;base64,{{$posts->user->profile->Profile_picture}}'>
                        <a href="{{ url('Profiel') }}/{{ $posts->user->nickname}}">{{$posts->user->nickname}}</a>
                    </h3>
                    <div class="content">
                        <blockquote class="blockquote">{{ $posts->Text_title }}<br><br>
                        <p> - <i>{{ $posts->Text_body }}</i></p></blockquote>
                        <div class="content-options">
                            @foreach ($posts->Likes as $like)
                            <a href="{{ route('likes', $posts ) }}" onload="checklike('{{ $like->isLiked }}')"><i class="far fa-heart fa-lg" id="like" style="color: red"></i></a> 
                            @endforeach
                            <i class="fas fa-lg fa-comment" id="comment_text{{ $posts->Post_id }}"  onclick="show('{{ $posts->Post_id }}')"></i>
                            <span>likes {{ $posts->likes->count()}}</span>
                            <span>Reacties {{ $posts->comments->count() }}</span>
                        </div>
                    </div>
                    <div class="comments">
                        <div id="show_comment_text{{ $posts->Post_id }}" style="display: none;">
                            <form method="post" class="newcomment form-inline" action="{{ route('comment_add')}} ">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                <input type="hidden" name="post_id" value="{{ $posts->Post_id }}" id="post_id">
                                <input type="text" placeholder="Comment" name="comment" class="form-control">
                                <input type="submit" value="Plaatsen" class="btn btn-success">
                            </form>
                            <div> 
                                @foreach ($posts->comments as $comment)
                                    <div class="comment">
                                        <img src='data:image/x-icon;base64,{{$posts->user->profile->Profile_picture}}'>
                                        <a href="{{ url('Profiel') }}/{{ $comment->user->nickname}}">{{$comment->user->nickname}}</a>
                                        <span>{{$comment->Comment}}</span>
                                        <span style="float: right;">{{$comment->created_at }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
              @endforeach
            </div>
            <div class="col-md-6"> 
              @foreach ($post as $posts)
                @if ($posts->Post_type == 'Foto')
                <div class="card">
                    <h3 class="card-head">
                        <img src='data:image/x-icon;base64,{{$posts->user->profile->Profile_picture}}'>
                        <a href="{{ url('Profiel') }}/{{ $posts->user->nickname}}">{{$posts->user->nickname}}</a>
                    </h3>
                        <img src="data:image/x-icon;base64,{{$posts->Foto}}" width="300px" height="auto">
                    <div class="content">
                        <p class="Text_body">{{$posts->Text_body}}</p>
                        <div class="content-options">
                            <a href="{{ route('likes', $posts ) }}"><i class="far fa-heart fa-lg" id="like" style="color: red"></i></a>                   
                            <i class="fas fa-lg fa-comment" id="comment_text{{ $posts->Post_id }}"  onclick="show('{{ $posts->Post_id }}')"></i>
                            <span>likes {{ $posts->likes->count()}}</span>
                            <span>Reacties {{ $posts->comments->count() }}</span>
                        </div>
                    </div>
                    <div class="comments">
                        <div id="show_comment_text{{ $posts->Post_id }}" style="display: none;">
                            <form method="post" class="newcomment form-inline" action="{{ route('comment_add')}} ">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                <input type="hidden" name="post_id" value="{{ $posts->Post_id }}" id="post_id">
                                <input type="text" placeholder="Comment" name="comment" class="form-control">
                                <input type="submit" value="Plaatsen" class="btn btn-success">
                            </form>
                            <div> 
                                @foreach ($posts->comments as $comment)
                                    <div class="comment">
                                        <img src='data:image/x-icon;base64,{{$posts->user->profile->Profile_picture}}'>
                                        <a href="{{ url('Profiel') }}/{{ $comment->user->nickname}}">{{$comment->user->nickname}}</a>
                                        <span>{{$comment->Comment}}</span>
                                        <span style="float: right;">{{$comment->created_at }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
              @endforeach
          </div>
      </div>
</div>
@endsection