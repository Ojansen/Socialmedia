<form method="post" action="{{route('comment.update',[$comment])}}">
    {{ csrf_field() }}
    <input type="text" value="{{$comment->Comment}}" name="comment" placeholder="">
    <input type="submit">
</form>