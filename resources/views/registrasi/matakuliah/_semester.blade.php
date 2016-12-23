{{ $s->semester }}

@if($s->status == 'Aktif')
	<p class="text-success">
		<i class="fa fa-flag-checkered"></i> {{ $s->status }}
	</p>
@endif