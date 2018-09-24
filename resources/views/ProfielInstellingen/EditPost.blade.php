<form method="post" action="{{ route('editpost',$apost->Post_id) }}">
    {{method_field('post')}}
    {{csrf_field()}}
    <input type="text" name="texttitle" value="{{$valuetitle}}">
    <input type="text" name="textbody" value="{{$valuebody}}">
    <input type="submit" name="submit" value="Aanpassen">
</form>