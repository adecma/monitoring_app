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

		<a href="#cetak" class="btn btn-xs btn-warning" data-toggle="modal"><i class="fa fa-print"></i> Cetak</a>

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

	<div class="modal fade" id="cetak">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pilih semester</h4>
				</div>
				<div class="modal-body text-center">
					@foreach($periode->semesters as $s)
						<a href="{{ route('registrasi_matakuliah.topdf', [$periode->id, $s->id, time()]) }}" class="btn btn-sm btn-warning"><i class="fa fa-print"></i> Cetak Semester {{ $s->jenis }}</a>
					@endforeach
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('js')
	{!! $html->scripts() !!}
@endpush