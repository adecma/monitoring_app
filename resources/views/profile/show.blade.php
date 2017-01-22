@extends('layouts.app')

@section('heading')
	<h4>
		Profil {{ $user->name }}
	</h4>
	<hr>
@endsection

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-body">
				<dl class="dl-horizontal">
					<dt>Nama</dt>
					<dd>{{ $user->name }}</dd>
					<dt>No. Induk</dt>
					<dd>{{ $user->no_induk }}</dd>
					<dt>E-mail</dt>
					<dd>{{ $user->email }}</dd>
					@if($user->hasRole('mahasiswa'))
						<dt>Jurusan</dt>
						<dd>{{ $user->jurusan->first()->name }}</dd>
					@endif
					<dt>Peran</dt>
					<dd>{{ $user->roles->first()->display_name }}</dd>
					<dt>Diperbaharui</dt>
					<dd>{{ $user->updated_at->diffForHumans() }}</dd>
				</dl>
			</div>

			<div class="panel-footer">
				<div class="text-right">
					<a href="{{ route('profile.edit') }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
				</div>				
			</div>
		</div>
	</div>
@endsection