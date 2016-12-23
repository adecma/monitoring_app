@foreach($semester as $semes)
	{!! Form::open(['route' => ['periode.aktifkan', $semes->id], 'method' => 'put']) !!}
		@if($semes->status == 'Aktif') 
			<p class="text-success">
				<i class="fa fa-flag-checkered"></i> {{ $semes->jenis }}
			</p>
		@else
			<p>
				{{ $semes->jenis }} <button class="btn btn-xs btn-warning" type="submit"><i class="fa fa-flash"></i> Aktifkan</button>
			</p>
		@endif
	{!! Form::close() !!}
@endforeach