@php($rank=1)
@foreach($sorted_hashtags as $hashtag => $value)

    {{$rank}}. {{$hashtag}}
    <br>
    {{count($value)}}x Gebruikt
    <br><br>
    @php($rank++)
    @endforeach