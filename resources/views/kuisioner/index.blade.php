@extends('layouts.app')

@section('heading')
	<h4>
		Katalog Matakuliah
	</h4>

	<hr>

@endsection

@section('content')
	<div class="col-md-12">
		@foreach($katalog as $periode)
			<div class="panel panel-success">
				<div class="panel-heading">Periode {{ $periode->name }}</div>
				<div class="panel-body">
					@foreach($periode->semesters as $semester)
						<div class="row">
							<div class="col-md-12">
								<p class="">
									<strong>Semester {{ $semester->jenis }}</strong>
									@if($semester->status == 'Aktif')
										<strong>(Diaktifkan)</strong>
									@endif
								</p>
							</div>							
						</div>

						@foreach ($semester->registrasi_matakuliah->chunk(4) as $chunk)
						    <div class="row">
						        @foreach ($chunk as $matakuliah)
						            <div class="col-xs-3">
						            	<div class="panel panel-info">
						            		<div class="panel-heading">
						            			{{ $matakuliah->matakuliah_kd }} - {{ $matakuliah->matakuliah->name }} <br>
						            			Dosen {{ $matakuliah->dosen->name }} <br>
						            			Semester {{ $matakuliah->semes }}
						            		</div>

						            		<a href="{{ route('katalog.show', $matakuliah->id) }}">
					                            <div class="panel-footer">
					                                <span class="pull-left">Isi Kuisioner</span>
					                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					                                <div class="clearfix"></div>
					                            </div>
					                        </a>
						            	</div>
						            </div>
						        @endforeach
						    </div>
						@endforeach
					@endforeach
				</div>
			</div>
		@endforeach
	</div>
@endsection