@extends('layouts.app')

@section('heading')
	<h4>Master Matakuliah
	</h4>

	<hr>
@endsection

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading"><i class="fa fa-edit"></i> Edit</div>
			
			{!! Form::open(['route' => ['matakuliah.update', $matakuliah->kd], 'method' => 'put']) !!}
				<div class="panel-body">
					<div class="form-group {{ $errors->has('kode') ? 'has-error' : '' }}">
						{{ Form::label('kode', 'Kode') }}
						{{ Form::text('kode', $matakuliah->kd, ['class' => 'form-control', 'placeholder' => 'Kode matakuliah', 'autocomplete' => 'off']) }}

						@if($errors->has('kode'))
							<span class="help-block">
								<strong>{{ $errors->first('kode') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						{{ Form::label('name', 'Nama') }}
						{{ Form::text('name', $matakuliah->name, ['class' => 'form-control', 'placeholder' => 'Nama matakuliah', 'autocomplete' => 'off']) }}

						@if($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
					</div>
				</div>
				
				<div class="panel-footer">
					<a href="{{ route('matakuliah.index') }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-left"></i> Batal</a>

					<div class="pull-right">
						<button class="btn btn-xs btn-primary" type="submit"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection