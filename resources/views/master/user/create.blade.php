@extends('layouts.app')

@section('heading')
	<h4>Master Mahasiswa
	</h4>

	<hr>
@endsection

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading"><i class="fa fa-plus"></i> Tambah</div>
			
			{!! Form::open(['route' => 'user.store']) !!}
				<div class="panel-body">
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						{{ Form::label('name', 'Nama') }}
						{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama lengkap', 'autocomplete' => 'off']) }}

						@if($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('no_induk') ? 'has-error' : '' }}">
						{{ Form::label('no_induk', 'No. Induk') }}
						{{ Form::text('no_induk', null, ['class' => 'form-control', 'placeholder' => 'Nomor induk', 'autocomplete' => 'off']) }}

						@if($errors->has('no_induk'))
							<span class="help-block">
								<strong>{{ $errors->first('no_induk') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
						{{ Form::label('email', 'E-mail') }}
						{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail valid', 'autocomplete' => 'off']) }}

						@if($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
						{{ Form::label('role', 'Peran') }}
						{{ Form::select('role', $roles, null, ['id' => 'role', 'class' => 'form-control', 'placeholder' => 'Pilih peran']) }}

						@if($errors->has('role'))
							<span class="help-block">
								<strong>{{ $errors->first('role') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
						{{ Form::label('password', 'Sandi Baru') }}
							
						{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Kata sandi baru', 'autocomplete' =>'off']) }}
									
						@if($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
				</div>
				
				<div class="panel-footer">
					<a href="{{ route('user.index') }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-left"></i> Batal</a>

					<div class="pull-right">
						<button class="btn btn-xs btn-primary" type="submit"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@push('js')
	<script>
		$('#role').select2({
			placeholder : 'Pilih peran',
			allowClear: true
		});
	</script>
@endpush