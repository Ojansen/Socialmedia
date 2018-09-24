@extends('layouts.app')
@section('error')

@if ($errors->any())
<div class="alert alert-info alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Warning!</strong> 
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
</div>
@endif

@endsection


@section('content')
<div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="panel panel-section">
                    <div class="panel-body">
                        <label class="col-md-12 col-xs-12"><a href="{{ url('/Instellingen') }}">Account instellingen</a></label>
                        <label class="col-md-12 col-xs-12"><a href="{{ url('/ProfielInstellingen') }}">Profiel instellingen</a></label>
                    </div>
                </div>
            </div>

			
			            
			            <div class="col-md-8">
			            	<div class="panel-section">
			            		<div class="panel-heading"><h2 class="panel-title">Account Instellingen</h2></div>
			                <div class="panel panel-css">
			                    
			                    <div class="panel-body">
			                        <label class="col-md-4 col-xs-6">Gebruikersnaam</label>
			                        <label class="col-md-4 col-xs-6">{{ Auth::user()->nickname}}</label>
			                            <p class="text-right col-md-4">
			                                <a id="EditNickname">Aanpassen</a>
			                                </a>
			                            </p>
			                        <div class="col-md-12" id="EditNicknameTab" style="display: none;">
			                            <form method="post" action="{{ route('edit_nickname')  }}">
										    {{ csrf_field() }}
										    {{ method_field('post') }}
										    <div class="form-inline row">
											    <div class="form-group col-md-3 col-xs-3">
												    Gebruikersnaam: 
												</div>
												<div class="form-group col-md-9 col-xs-9 text-right">
													<input type="text" name="nickname" class="col-md-12 col-xs-12" autofocus="">
												</div>
											</div>
											<div class="form-inline row">
											    <div class="form-group col-md-12 col-xs-12 text-right">
												    <input type="submit" name="wijzigen" value="wijzigen" class="btn btn-default">
											    </div>
											</div>
										</form>
			                        </div>
			                    </div>
			                </div>

			                <div class="panel panel-css">
			                    <div class="panel-body">
			                        <label class="col-md-4 col-xs-6">Voornaam</label>
			                        <label class="col-md-4 col-xs-6">{{ Auth::user()->first_name}}</label>
			                            <p class="text-right col-md-4">
			                                <a id="EditFirstname">Aanpassen
			                                </a>
			                            </p>
			                        <div class="col-md-12" id="EditFirstnameTab" style="display: none;">
			                            <form method="post" action="{{ route('edit_name')  }}">
										    {{ csrf_field() }}
										    {{ method_field('post') }}
										    <div class="form-inline row">
											    <div class="form-group col-md-3 col-xs-3">
												    Nieuwe naam: 
												</div>
												<div class="form-group col-md-9 col-xs-9">
													<input type="text" name="naam" class="col-md-12" autofocus="">
												</div>
											</div>
											<div class="form-inline row">
											    <div class="form-group col-md-12 col-xs-12 text-right">
												    <input type="submit" name="wijzigen" value="wijzigen" class="btn btn-default">
											    </div>
											</div>
										</form>
			                        </div>
			                    </div>
			                </div>

			                <div class="panel panel-css">
			                    <div class="panel-body">
			                        <label class="col-md-4 col-xs-6">Achternaam</label>
			                        <label class="col-md-4 col-xs-6">{{ Auth::user()->last_name}}</label>
			                            <p class="text-right col-md-4">
			                                <a id="EditLastname">Aanpassen
			                                </a>
			                            </p>
			                        <div class="col-md-12" id="EditLastnameTab" style="display: none;">
			                            <form method="post" action="{{ route('edit_lastname')  }}">
										    {{ csrf_field() }}
										    {{ method_field('post') }}
										    <div class="form-inline row">
											    <div class="form-group col-md-3 col-xs-3">
												    Achternaam: 
												</div>
												<div class="form-group col-md-9 col-xs-9">
													<input type="text" name="achternaam" class="col-md-12 col-xs-12" autofocus="">
												</div>
											</div>
											<div class="form-inline row">
											    <div class="form-group col-md-12 col-xs-12 text-right">
												    <input type="submit" name="wijzigen" value="wijzigen" class="btn btn-default">
											    </div>
											</div>
										</form>
			                        </div>
			                    </div>
			                </div>

			                <div class="panel panel-css">
			                    <div class="panel-body">
			                        <label class="col-md-4 col-xs-6">E-mail</label>
			                        <label class="col-md-4 col-xs-6">{{ Auth::user()->email}}</label>
			                            <p class="text-right col-md-4">
			                                <a id="EditEmail">Aanpassen</a>
			                            </p>
			                        <div class="col-md-12" id="EditEmailTab" style="display: none;">
			                           <form method="post" action="{{ route('edit_email')  }}">
										    {{ csrf_field() }}
										    {{ method_field('post') }}
										    <div class="form-inline row">
											    <div class="form-group col-md-3 col-xs-3">
												    Nieuwe e-mail: 
												</div>
												<div class="form-group col-md-9 col-xs-9">
													<input type="email" name="email1" class="col-md-12 col-xs-12" autofocus="">
												</div>
											</div>
											<div  class="form-inline row">
												<div class="form-group col-md-3 col-xs-3">
												    Herhaal e-mail: 
												</div>
												<div class="form-group col-md-9 col-xs-9">
													<input type="email" name="email2" class="col-md-12 col-xs-12">
												</div>
											</div>
											<div class="form-inline row">
												<div class="form-group col-md-12 col-xs-12 text-right">
												    <input type="submit" name="wijzigen" value="wijzigen" class="btn btn-default">
											    </div>
											</div>
										</form>
			                        </div>
			                    </div>
			                </div>

			                <div class="panel panel-css">
			                    <div class="panel-body">
			                        <label class="col-md-4 col-xs-6">Wachtwoord</label>
			                        <label class="col-md-4 col-xs-6">********</label>
			                            <p class="text-right col-md-4">
			                                <a id="EditPassword">Aanpassen</a>
			                            </p>
			                        <div class="col-md-12" id="EditPasswordTab" style="display: none;">
			                            <form method="post" action="{{ route('edit_password')  }}">
										    {{ csrf_field() }}
										    {{ method_field('post') }}
										    <div class="form-inline row">
										    	<div class="form-group col-md-4 col-xs-4">
										    		Oud wachtwoord: 
										    	</div>
										    	<div class="form-group col-md-8 col-xs-8">
													<input type="password" name="old_password" class="col-md-12 col-xs-12" autofocus="" required="">
												</div>
											</div>
										    <div class="form-inline row">
											    <div class="form-group col-md-4 col-xs-4">
												    Nieuw wachtwoord: 
												</div>
												<div class="form-group col-md-8 col-xs-8">
													<input type="password" name="new_password1" class="col-md-12 col-xs-12" required="">
												</div>
											</div>
											<div  class="form-inline row">
												<div class="form-group col-md-4 col-xs-4">
												    Herhaal wachtwoord: 
												</div>
												<div class="form-group col-md-8 col-xs-8">
													<input type="password" name="new_password2" class="col-md-12 col-xs-12" required="">
												</div>
											</div>
											<div class="form-inline row">
												<div class="form-group col-md-12 text-right">
												    <input type="submit" name="wijzigen" value="wijzigen" class="btn btn-default">
											    </div>
											</div>
										</form>
			                        </div>
			                    </div>
			                </div>

			                <div class="panel panel-css">
			                    <div class="panel-body">
			                        <label class="col-md-4 col-xs-6">Geboortedatum</label>
			                        <label class="col-md-4 col-xs-6">{{ Auth::user()->birthday}}</label>
			                            <p class="text-right col-md-4">
			                                <a id="EditBirthday">Aanpassen</a>
			                            </p>
			                        <div class="col-md-12" id="EditBirthdayTab" style="display: none;">
			                            <form method="post" action="{{ route('edit_birthday')  }}">
										    {{ csrf_field() }}
										    {{ method_field('post') }}
										    <div class="form-inline row">
											    <div class="form-group col-md-3 col-xs-3">
												    Geboortedatum: 
												</div>
												<div class="form-group col-md-9 col-xs-9">
													<input type="date" name="geb_datum" class="col-xs-12 col-md-12" autofocus="" required="">
												</div>
											</div>
											<div class="form-inline row">
											    <div class="form-group col-md-12 col-xs-12 text-right">
												    <input type="submit" name="wijzigen" value="wijzigen" class="btn btn-default">
											    </div>
											</div>
										</form>
			                        </div>
			                    </div>
			                </div>

			                <div class="panel panel-css">
			                    <div class="panel-body">
			                        <label class="col-md-8">Account</label>
			                            <p class="text-right col-md-4">
			                                <a id="DeleteAcc">Verwijderen</a>
			                            </p>
			                        <div class="col-md-12" id="DeleteAccTab" style="display: none;">
			                            <form method="post" action="{{ route('delete_acc')  }}">
										    {{ csrf_field() }}
										    {{ method_field('post') }}
										    <div class="form-inline row">
										    	<div class="form-group col-md-4 col-xs-4">
										    		Wachtwoord: 
										    	</div>
										    	<div class="form-group col-md-8 col-xs-8">
													<input type="password" name="password_check" class="col-xs-12 col-md-12" autofocus="">
												</div>
											</div>
											<div class="form-inline row">
											    <div class="form-group col-md-12 col-xs-12 text-right">
												    <input type="submit" name="del_user" value="Verwijder" class="btn btn-danger">
											    </div>
											</div>
										</form>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>	
			</div>
@endsection 