@extends('layouts.app')

@section('heading')
	<h4>
		Master Kompetensi
	</h4>

	<hr>
@endsection

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading"><i class="fa fa-edit"></i> Edit</div>
			
			{!! Form::open(['route' => ['kompetensi.update', $kompetensi->id], 'method' => 'put']) !!}
				<div class="panel-body">
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						{{ Form::label('name', 'Nama') }}
						{{ Form::text('name', $kompetensi->name, ['class' => 'form-control', 'placeholder' => 'Nama kompetensi', 'autocomplete' => 'off']) }}

						@if($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
					</div>
				</div>
				
				<div class="panel-footer">
					<a href="{{ route('kompetensi.index') }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-left"></i> Batal</a>

					<div class="pull-right">
						<button class="btn btn-xs btn-primary" type="submit"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection