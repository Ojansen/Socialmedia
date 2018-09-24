@extends('layouts.app')
@section('content')
<div style=" width: 400px; height:500px; margin: auto; border-style: dotted">
    <input type="text" name="zoekVriend" placeholder="Zoek in Vrienden">
    <input type="submit" name="zoekVriendKnop"><br>
    @foreach($userfriend as $user)
        {{--{{dd($user)}}--}}
        <?php
        $userOnline = \App\User::find($user->id);
        ?>
        @if($userOnline->isOnline())
            <img src="/../img/onlineCirkel.jpg" style="width:13px; height: auto;">
        @else
            <img src="/../img/offlineCirkel.jpg" style="width:13px; height: auto;">
        @endif

        {{$user->first_name}}<br>
    @endforeach
</div>
@endsection