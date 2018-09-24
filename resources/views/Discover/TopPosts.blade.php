@foreach($posts as $post)
    {{$post->Text_title}}
    <br><br>

    {{--Copy de output van alle posts hiernaar toe, gaat op zelfde manier--}}
    @endforeach