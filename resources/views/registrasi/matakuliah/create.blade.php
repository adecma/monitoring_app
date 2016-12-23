@extends('layouts.app')

@section('heading')
	<h4>
		Tambah Registrasi Matakuliah periode {{ $periode->name }}
	</h4>

	<div class="pull-right">
		<ol class="breadcrumb">
			<li><a href="{{ route('registrasi_matakuliah.create', $periode->id) }}">Tambah Matakuliah</a></li>
			<li><a href="{{ route('registrasi_matakuliah.show', $periode->id) }}">Periode {{ $periode->name }}</a></li>
			<li><a href="{{ route('registrasi_matakuliah.index') }}">Registrasi</a></li>
			<li><i class="fa fa-sitemap"></i></li>
		</ol>
	</div>
@endsection

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading"><i class="fa fa-plus"></i> Tambah</div>
			
			{!! Form::open(['route' => ['registrasi_matakuliah.store', $periode->id]]) !!}
				<div class="panel-body">
					<div class="form-group {{ $errors->has('semester') ? 'has-error' : '' }}">
						{{ Form::label('semester', 'Semester') }}
						{{ Form::select('semester', $semesters, null, ['id' => 'semester', 'class' => 'form-control', 'placeholder' => 'Pilih semester']) }}

						@if($errors->has('semester'))
							<span class="help-block">
								<strong>{{ $errors->first('semester') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('jurusan') ? 'has-error' : '' }}">
						{{ Form::label('jurusan', 'Jurusan') }}
						{{ Form::select('jurusan', $jurusans, null, ['id' => 'jurusan', 'class' => 'form-control', 'placeholder' => 'Pilih jurusan']) }}

						@if($errors->has('jurusan'))
							<span class="help-block">
								<strong>{{ $errors->first('jurusan') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('semes') ? 'has-error' : '' }}">
						{{ Form::label('semes', 'Semes') }}
						{{ Form::text('semes', null, ['class' => 'form-control', 'placeholder' => 'Di semester', 'autocomplete' => 'off']) }}

						@if($errors->has('semes'))
							<span class="help-block">
								<strong>{{ $errors->first('semes') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('matakuliah') ? 'has-error' : '' }}">
						{{ Form::label('matakuliah', 'Matakuliah') }}
						{{ Form::select('matakuliah', $matakuliahs, null, ['id' => 'matakuliah', 'class' => 'form-control', 'placeholder' => 'Pilih matakuliah']) }}

						@if($errors->has('matakuliah'))
							<span class="help-block">
								<strong>{{ $errors->first('matakuliah') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('dosen') ? 'has-error' : '' }}">
						{{ Form::label('dosen', 'Dosen') }}
						{{ Form::select('dosen', $dosens, null, ['id' => 'dosen', 'class' => 'form-control', 'placeholder' => 'Pilih dosen']) }}

						@if($errors->has('dosen'))
							<span class="help-block">
								<strong>{{ $errors->first('dosen') }}</strong>
							</span>
						@endif
					</div>
				</div>
				
				<div class="panel-footer">
					<a href="{{ route('registrasi_matakuliah.show', $periode->id) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-left"></i> Batal</a>

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
		$('#semester').select2({
			placeholder : 'Pilih semester',
			allowClear: true
		});
		$('#jurusan').select2({
			placeholder : 'Pilih jurusan',
			allowClear: true
		});
		$('#matakuliah').select2({
			placeholder : 'Pilih matakuliah',
			allowClear: true
		});
		$('#dosen').select2({
			placeholder : 'Pilih dosen',
			allowClear: true
		});
	</script>
@endpush