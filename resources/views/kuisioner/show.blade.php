@extends('layouts.app')

@section('heading')
	<h4>
		Kuisioner Matakuliah
		<div class="pull-right">
			<a href="{{ route('katalog.index') }}" class="btn btn-xs btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
		</div>
	</h4>

	<hr>

@endsection

@section('content')
	<div class="col-md-12">
		<p class="text-center">
			<span class="label label-success">{{ $regMhs->registrasi_matakuliah->semester->periode->name }}</span>
			<span class="label label-success">{{ $regMhs->registrasi_matakuliah->semester->jenis }}</span>
			@if($regMhs->registrasi_matakuliah->semester->status == 'Aktif')
				<span class="label label-danger"><i class="fa fa-flag-checkered"></i> {{ $regMhs->registrasi_matakuliah->semester->status }}</span>
			@endif

			<br>

			<span class="label label-default">{{ $regMhs->registrasi_matakuliah->jurusan->name }}</span>
			<span class="label label-primary">{{ $regMhs->registrasi_matakuliah->semes }}</span>
			<span class="label label-info">{{ $regMhs->registrasi_matakuliah->matakuliah_kd }}</span>
			<span class="label label-info">{{ $regMhs->registrasi_matakuliah->matakuliah->name }}</span>
			<span class="label label-warning">{{ $regMhs->registrasi_matakuliah->dosen->name }}</span>
		</p>
		
		<hr>

		@if(empty($regMhs->aspeks->count()))
			@if($regMhs->registrasi_matakuliah->semester->status == 'Aktif')
				<div class="panel panel-success">
					{!! Form::open(['route' => ['katalog.store', $regMhs->registrasi_matakuliah->id]]) !!}
						<div class="panel-body">
							<ol type="A">
								@foreach ($kuisioner as $kompetensi)
									<li>
										{{ $kompetensi->name }} 
										<table class="table">
											<tbody>
												@foreach ($kompetensi->aspeks as $aspek)
													<tr>
														<td width="70%">{{ $no++ }}. {{ $aspek->name }}</td>
														<td>
															<div class="form-group{{ $errors->has('nilai['.$aspek->id.']') ? ' has-error' : '' }}">
																<label class="radio-inline">
																	{{ Form::radio('nilai['.$aspek->id.']', '1') }}1
																</label>
																<label class="radio-inline">
																	{{ Form::radio('nilai['.$aspek->id.']', '2') }}2
																</label>
																<label class="radio-inline">
																	{{ Form::radio('nilai['.$aspek->id.']', '3') }}3
																</label>
																<label class="radio-inline">
																	{{ Form::radio('nilai['.$aspek->id.']', '4') }}4
																</label>
																<label class="radio-inline">
																	{{ Form::radio('nilai['.$aspek->id.']', '5') }}5
																</label>

																@if ($errors->has('nilai['.$aspek->id.']'))
											                        <span class="help-block">
											                            <strong>{{ $errors->first('nilai['.$aspek->id.']') }}</strong>
											                        </span>
											                    @endif
															</div>
														</td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</li>
								@endforeach
							</ol>
						</div>
						<div class="panel-footer">
							<button class="btn btn-xs btn-primary" type="submit"><i class="fa fa-save"></i> Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@else
				<p>
					<code>
						<strong>Maaf! Kuisioner dinonaktifkan</strong>, sehingga untuk saat ini Anda tidak diizinkan mengisi kuisioner.
					</code>
				</p>					
			@endif				
		@else
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="lead text-center">
						Jumlah skor untuk kuisioner ini berjumlah <br> {{ $regMhs->aspeks()->sum('skor') }}
					</div>
				</div>
			</div>
		@endif
				
	</div>
@endsection