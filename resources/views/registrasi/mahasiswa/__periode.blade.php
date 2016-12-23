@extends('layouts.app')

@section('heading')
	<h4>Registrasi Matakuliah periode {{ $periode->name }}
		<div class="pull-right">
			<a href="{{ route('registrasi_matakuliah.index') }}" class="btn btn-xs btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>

			<a href="{{ route('registrasi_matakuliah.create', $periode->id) }}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Tambah</a>
		</div>
	</h4>

	<hr>

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