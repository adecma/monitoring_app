@extends('layouts.app')

@section('heading')
	<h4>
		Tambah Registrasi Mahasiswa
	</h4>

	<div class="pull-right">
		<ol class="breadcrumb">
			<li><a href="{{ route('registrasi_mahasiswa.create', [$reg->semester->periode->id, $reg->id]) }}">Tambah</a></li>
			<li><a href="{{ route('registrasi_mahasiswa.index', [$reg->semester->periode->id, $reg->id]) }}">Registrasi Mahasiswa</a></li>
			<li><a href="{{ route('registrasi_matakuliah.show', $reg->semester->periode->id) }}">Periode {{ $reg->semester->periode->name }}</a></li>
			<li><a href="{{ route('registrasi_matakuliah.index') }}">Registrasi</a></li>
			<li><i class="fa fa-sitemap"></i></li>
		</ol>
	</div>
@endsection

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading"><i class="fa fa-plus"></i> Tambah</div>
			
			{!! Form::open(['route' => ['registrasi_mahasiswa.store', $reg->semester->periode->id, $reg->id]]) !!}
				<div class="panel-body">
					<p class="text-center">
						<span class="label label-success">{{ $reg->semester->periode->name }}</span>
						<span class="label label-success">{{ $reg->semester->jenis }}</span>
						@if($reg->semester->status == 'Aktif')
							<span class="label label-danger"><i class="fa fa-flag-checkered"></i> {{ $reg->semester->status }}</span>
						@endif

						<br>

						<span class="label label-default">{{ $reg->jurusan->name }}</span>
						<span class="label label-primary">{{ $reg->semes }}</span>
						<span class="label label-info">{{ $reg->matakuliah_kd }}</span>
						<span class="label label-info">{{ $reg->matakuliah->name }}</span>
						<span class="label label-warning">{{ $reg->dosen->name }}</span>
					</p>
					<div class="form-group {{ $errors->has('mahasiswa') ? 'has-error' : '' }}">
						{{ Form::label('mahasiswa', 'Mahasiswa') }}
						{{ Form::select('mahasiswa[]', $mahasiswas, null, ['id' => 'mahasiswa', 'class' => 'form-control', 'multiple' => true]) }}

						@if($errors->has('mahasiswa'))
							<span class="help-block">
								<strong>{{ $errors->first('mahasiswa') }}</strong>
							</span>
						@endif
					</div>
				</div>
				
				<div class="panel-footer">
					<a href="{{ route('registrasi_mahasiswa.index', [$reg->semester->periode->id, $reg->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-left"></i> Batal</a>

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
		$('#mahasiswa').select2({
			placeholder : 'Pilih mahasiswa',
			allowClear: true
		});
	</script>
@endpush