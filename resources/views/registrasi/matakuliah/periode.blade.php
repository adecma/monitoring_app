@extends('layouts.app')

@section('heading')
	<h4>Registrasi Periode {{ $periode->name }}
		
	</h4>

	<div class="pull-right">
		<ol class="breadcrumb">
			<li><a href="{{ route('registrasi_matakuliah.show', $periode->id) }}">Periode {{ $periode->name }}</a></li>
			<li><a href="{{ route('registrasi_matakuliah.index') }}">Registrasi</a></li>
			<li><i class="fa fa-sitemap"></i></li>
		</ol>
	</div>

	<p>
		<a href="{{ route('registrasi_matakuliah.index') }}" class="btn btn-xs btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>

		<a href="#" class="btn btn-xs btn-warning"><i class="fa fa-print"></i> Cetak</a>

		@role('admin')
			<a href="{{ route('registrasi_matakuliah.create', $periode->id) }}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Tambah</a>
		@endrole
	</p>

@endsection

@section('content')
	<div class="col-md-12">
		<div class="table-responsive">
			{!! $html->table() !!}
		</div>
	</div>

@endsection

@push('js')
	{!! $html->scripts() !!}
@endpush