@extends('layouts.app')

@section('heading')
	<h4>
		Profil {{ $user->name }}
	</h4>
	<hr>
@endsection

@section('content')
	<div class="col-md-6 div col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Edit</div>

			{!! Form::model($user, ['route' => 'profile.update']) !!}
				<div class="panel-body">
					<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
						{{ Form::label('name', 'Nama') }}
						
						{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama lengkap', 'autocomplete' =>'off']) }}

						@if ($errors->has('name'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('name') }}</strong>
	                        </span>
	                    @endif
					</div>	

					<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
						{{ Form::label('email', 'Email') }}
						
						{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail valid', 'autocomplete' =>'off']) }}

						@if ($errors->has('email'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('email') }}</strong>
	                        </span>
	                    @endif
					</div>	

					<div class="form-group {{ $errors->has('old_password') || Session::has('old_password') ? 'has-error' : '' }}">
						{{ Form::label('old_password', 'Sandi Lama') }}
							
						{{ Form::password('old_password', ['class' => 'form-control', 'placeholder' => 'Kata sandi lama', 'autocomplete' =>'off']) }}
								
						@if($errors->has('old_password') || Session::has('old_password'))
							<span class="help-block">
								{{ $errors->first('old_password') }} {{ Session::get('old_password') }}
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
						{{ Form::label('new_password', 'Sandi Baru') }}
							
						{{ Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Kata sandi baru', 'autocomplete' =>'off']) }}
									
						@if($errors->has('new_password'))
							<span class="help-block">
								{{ $errors->first('new_password') }}
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
						{{ Form::label('new_password_confirmation', 'Ulangi Sandi Baru') }}
						
						{{ Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => 'Ulangi kata sandi baru', 'autocomplete' =>'off']) }}
							
						@if($errors->has('new_password_confirmation'))
							<span class="help-block">
								{{ $errors->first('new_password_confirmation') }}
							</span>
						@endif
					</div>
				</div>

				<div class="panel-footer">
					<a href="{{ URL::previous() }}" class="btn btn-xs btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
					
					<div class="pull-right">
						<button type="submit" class="btn btn-xs btn-primary"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection