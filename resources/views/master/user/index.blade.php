@extends('layouts.app')

@section('heading')
	<h4>Master Mahasiswa
		<div class="pull-right">
			<a href="{{ route('user.create') }}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Tambah</a>
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