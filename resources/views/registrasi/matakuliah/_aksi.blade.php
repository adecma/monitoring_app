{!! Form::open(['url' => $form_url, 'method' => 'delete', 'class' => 'ask-delete']) !!}
	<p>
		<div class="btn-group">
			<a href="{{ $detail_url }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>

			<a href="{{ $print_url }}" class="btn btn-xs btn-warning"><i class="fa fa-print"></i></a>
		</div>
	</p>
	
	<p>
		<div class="btn-group">
			<a href="{{ $edit_url }}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>

			<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
		</div>
	</p>		
{!! Form::close() !!}