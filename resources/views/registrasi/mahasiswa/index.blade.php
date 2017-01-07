@extends('layouts.app')

@section('heading')
	<h4>
		Registrasi Mahasiswa
	</h4>

	<p>
		<a href="{{ route('registrasi_matakuliah.show', $reg->semester->periode_id) }}" class="btn btn-xs btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
		
		<a href="{{ route('registrasi_mahasiswa.topdf', [$reg->semester->periode->id, $reg->id, time()]) }}" class="btn btn-xs btn-warning"><i class="fa fa-print"></i> Cetak</a>
		
		@role('admin')
			<a href="{{ route('registrasi_mahasiswa.create', [$reg->semester->periode->id, $reg->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Tambah</a>
		@endrole

	</p>

	<div class="pull-right">
		<ol class="breadcrumb">
			<li><a href="{{ route('registrasi_mahasiswa.index', [$reg->semester->periode->id, $reg->id]) }}">Registrasi Mahasiswa</a></li>
			<li><a href="{{ route('registrasi_matakuliah.show', $reg->semester->periode->id) }}">Periode {{ $reg->semester->periode->name }}</a></li>
			<li><a href="{{ route('registrasi_matakuliah.index') }}">Registrasi</a></li>
			<li><i class="fa fa-sitemap"></i></li>
		</ol>
	</div>

@endsection

@section('content')
	<div class="col-md-12">
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

			<br>

			<span class="label label-success">Skor {{ $nilai->sum('countSkor') }}</span>
			<span class="label label-info">Rerata {{ $nilai->sum('rerataSkor') }}</span>

			<br>

			@if($nilai->sum('rerataSkor') >= 28.0 AND $nilai->sum('rerataSkor') <= 50.4)
                <span class="label label-warning">SANGAT TIDAK BAIK</span>
            @elseif(($nilai->sum('rerataSkor') >= 50.5 AND $nilai->sum('rerataSkor') <= 72.8))
                <span class="label label-warning">TIDAK BAIK</span>
            @elseif(($nilai->sum('rerataSkor') >= 72.9 AND $nilai->sum('rerataSkor') <= 95.2))
                <span class="label label-warning">CUKUP BAIK</span>
            @elseif(($nilai->sum('rerataSkor') >= 95.3 AND $nilai->sum('rerataSkor') <= 117.6))
                <span class="label label-warning">BAIK</span>
            @elseif(($nilai->sum('rerataSkor') >= 117.7 AND $nilai->sum('rerataSkor') <= 140.0))
                <span class="label label-warning">SANGAT BAIK</span>
            @else
                <span class="label label-warning">UNKNOWN</span> 
            @endif

		</p>
		<div class="table-responsive">
			{!! $html->table() !!}
		</div>
	</div>

@endsection

@push('js')
	{!! $html->scripts() !!}
@endpush