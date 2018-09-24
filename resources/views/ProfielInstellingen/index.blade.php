@extends('layouts.app')

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
            	<div class="panel-heading"><h2 class="panel-title">Layout aanpassen</h2></div>
                <div class="panel panel-css">
                    
                    <div class="panel-body">
                        <label class="col-md-6 col-xs-6">Achtergrond foto aanpassen</label>
                            <p class="text-right col-md-6">
                                <a id="EditHeader">Aanpassen</a>
                            </p>
                        <div class="col-md-12" id="EditHeaderTab" style="display: none;">
                            <hr class="hr-form">
							<form method="post" action="{{ route('EditHeader') }}"  enctype='multipart/form-data'>
							    {{method_field('post')}}
							    {{csrf_field()}}
							    <div class="form-inline row">
								    <div class="form-group col-md-3">
								    	Achtergrond foto
								    </div>
									<div class="form-group col-md-6">
										<input type="file" name="image" class="col-md-12">
									</div>
									<div class="form-group col-md-3">
									    <input type="submit" name="wijzigen" value="Aanpassen" class="btn btn-default">
								    </div>
								</div>
							</form>
                        </div>
                    </div>
                </div>

                <div class="panel panel-css">
                    <div class="panel-body">
                        <label class="col-md-6 col-xs-6">Pas tekst kleur aan</label>
                            <p class="text-right col-md-6">
                                <a id="EditFont" >Aanpassen</a>
                            </p>
                        <div class="col-md-12" id="EditFontTab" style="display: none;">
                        	<hr class="hr-form">
                            <form method="post" action="{{ route('EditFont') }}">
								{{method_field('post')}}
							    {{csrf_field()}}
								<div class="form-inline row">
									<div class="form-group col-md-3">
										Text kleur
									</div>
									<div class="form-group col-md-6">
										<input type="color" value="#fff" name="Font_Color" class="col-md-12">
									</div>
									<div class="form-group col-md-3">
									    <input type="submit" name="wijzigen" value="Aanpassen" class="btn btn-default">
								    </div>
								</div>
							</form>
                        </div>
                    </div>
                </div>

                <div class="panel panel-css">
                    <div class="panel-body">
                        <label class="col-md-6 col-xs-6">Pas achtergrond kleur aan</label>
                            <p class="text-right col-md-6">
                                <a id="EditBody">Aanpassen</a>
                            </p>
                        <div class="col-md-12" id="EditBodyTab" style="display: none;">
                        	<hr class="hr-form">
                            <form method="post" action="{{ route('EditBody') }}">
								{{method_field('post')}}
							    {{csrf_field()}}
								<div class="form-inline row">
									<div class="form-group col-md-3">
										Achtergrond kleur kleur
									</div>
									<div class="form-group col-md-6">
										<input type="color" value="#fff" name="Body_Color" class="col-md-12">
									</div>
									<div class="form-group col-md-3">
									    <input type="submit" name="wijzigen" value="Aanpassen" class="btn btn-default">
								    </div>
								</div>
							</form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="panel-section">
                    <div class="panel-heading"><h2 class="panel-title">Profiel aanpassen</h2></div>

                <div class="panel panel-css">
                    <div class="panel-body">
                        <label class="col-md-6 col-xs-6">Profiel foto aanpassen</label>
                            <p class="text-right col-md-6">
                                <a id="ProfielFoto" >Aanpassen</a>
                            </p>
                        <div class="col-md-12" id="ProfielFotoTab" style="display: none;">
                            <hr class="hr-form">
							<form method="post" action="{{ route('updatepf') }}"  enctype='multipart/form-data'>
							    {{method_field('post')}}
							    {{csrf_field()}}
							    <div class="form-inline row">
								    <div class="form-group col-md-3">
								    	Profiel foto
								    </div>
									<div class="form-group col-md-6">
										<input type="file" name="image" class="col-md-12">
									</div>
									<div class="form-group col-md-3">
									    <input type="submit" name="wijzigen" value="Aanpassen" class="btn btn-default">
								    </div>
								</div>
							</form>
							<form method="post" action="{{ route('removepf') }}">
							    {{method_field('post')}}
							    {{csrf_field()}}
							    <input type="submit" name="submit" value="verwijderen">
							</form>
                        </div>
                    </div>
                </div>

                <div class="panel panel-css">
                    <div class="panel-body">
                        <label class="col-md-6 col-xs-6">Pas bio aan</label>
                            <p class="text-right col-md-6">
                                <a id="UpdateBio" >Aanpassen</a>
                            </p>
                        <div class="col-md-12" id="UpdateBioTab" style="display: none;">
                            <hr class="hr-form">
							<form method="post" action="{{ route('updatebio') }}"  enctype='multipart/form-data' id="updatebio">
							    {{method_field('post')}}
							    {{csrf_field()}}
							    <div class="form-inline row">
								    <div class="form-group col-md-3">
								    	Bio
								    </div>
									<div class="form-group col-md-6">
										<!-- <input type="text" name="bio" class="col-md-12" > -->
										<textarea rows="2" cols="30" name="bio" form="updatebio" class="form-control"></textarea>
									</div>
									<div class="form-group col-md-3">
									    <input type="submit" name="wijzigen" value="Aanpassen" class="btn btn-default">
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