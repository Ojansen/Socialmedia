@extends('layouts.signin')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-3"></div>
	        <div class="col-md-6 wrapper">
                <div class="panel-heading"><h1 class="text-left">Registreer</h1><hr></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="nickname" type="text" class="form-control" name="nickname" placeholder="Nickname" value="{{ old('nickname') }}" required autofocus>

                                @if ($errors->has('nickname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
	                    <div class="form-group">
	                        <div class="{{ $errors->has('first_name') ? ' has-error' : '' }}">
	                        	<div class="col-xs-6">
	                                <input id="first_name" type="text" class="form-control" name="first_name" placeholder="Voornaam" value="{{ old('first_name') }}" required autofocus>

	                                @if ($errors->has('first_name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('first_name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="{{ $errors->has('last_name') ? ' has-error' : '' }}">
	                        	<div class="col-xs-6">
	                                <input id="last_name" type="text" class="form-control" name="last_name" placeholder="Achternaam" value="{{ old('last_name') }}" required autofocus>

	                                @if ($errors->has('last_name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('last_name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" placeholder="E-mail Adres" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
	                    <div class="form-group">
	                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
	                            <div class="col-xs-6">
	                                <input id="password" type="password" class="form-control" name="password" placeholder="Wachtwoord" required>
	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="col-xs-6">
	                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Herhaal" required>
	                        </div>
	                    </div>

	                	<div class="form-group">
	                		<div class="col-xs-6">
	                			<label for="birthday">Geboortedatum</label>
	                		</div>
						    <div class="col-xs-6">
					            <input type="date" class="form-control" name="birthday" placeholder="01-01-1970" id="birthday" required>
					            @if ($errors->has('birthday'))
							    	<span class="help-block">
							    		<strong>{{ $errors->first('birthday') }}</strong>
							    	</span>
							    @endif
						    </div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<div class="col-xs-6">
		                			<p><input type="radio" name="gender" value="man" id="gender" checked>
		                			 Man</p>
		                		</div>
		                		<div class="col-xs-6">
		                			<p><input type="radio" name="gender" value="woman" id="gender">
		                			 Vrouw</p>
		                		</div>
		                	</div>
		                </div>

	                    <div class="form-group">
	                        <div class="col-md-12">
	                            <button type="submit" class="btn btn-primary">
	                                Registreer
	                            </button>
	                        </div>
	                    </div>

                    </form>
                    	<hr>
                		<p>Heb je al een account log dan <a href="{{ route('login') }}">hier</a> in!</p>
                	</div>
            	</div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection