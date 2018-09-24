@extends('layouts.signin')
@section('content')

<div class="container">
    <div class="row">
    	<div class="col-md-3"></div>
	        <div class="col-md-6 wrapper">
	        	<div class="panel-heading"><h1 class="text-left">Welkom</h1><hr></div>

                <div class="panel-body">
                	<p>Heeft u al een account log <a href="{{ url('login') }}">hier</a> in. zo niet registreer je <a href="{{ route('register') }}">hier</a></p>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection
