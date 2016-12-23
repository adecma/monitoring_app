@extends('layouts.app')

@section('heading')
	<h4>
		Master Aspek
	</h4>

	<hr>
@endsection

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading"><i class="fa fa-edit"></i> Edit</div>
			
			{!! Form::open(['route' => ['aspek.update', $aspek->id], 'method' => 'put']) !!}
				<div class="panel-body">
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						{{ Form::label('name', 'Nama') }}
						{{ Form::textarea('name', $aspek->name, ['class' => 'form-control', 'placeholder' => 'Nama aspek', 'autocomplete' => 'off']) }}

						@if($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('kompetensi') ? 'has-error' : '' }}">
						{{ Form::label('kompetensi', 'kompetensi') }}
						{{ Form::select('kompetensi', $kompetensis, $aspek->kompetensi_id, ['id' => 'kompetensi', 'class' => 'form-control', 'placeholder' => 'Pilih kompetensi']) }}

						@if($errors->has('kompetensi'))
							<span class="help-block">
								<strong>{{ $errors->first('kompetensi') }}</strong>
							</span>
						@endif
					</div>
				</div>
				
				<div class="panel-footer">
					<a href="{{ route('aspek.index') }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-left"></i> Batal</a>

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
		$('#kompetensi').select2({
			placeholder : 'Pilih kompetensi',
			allowClear: true
		});
	</script>
@endpush