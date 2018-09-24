@extends('layouts.signin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
            <div class="col-md-6 wrapper">
                <div class="panel-heading"><h1 class="text-left">Login</h1><hr></div>

                <div class="panel-body">
                    <form class="" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input id="email" type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus aria-describedby="emailerror">
                            </div>
                            <div class="col-xs-12">
                                @if ($errors->has('email'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Wachtwoord" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group col-xs-12">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>   
                                 <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                        <hr>
                        <p>Nog geen account registreer je <a href="{{ route('register') }}">hier</a></p>
                    </div>
                </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection