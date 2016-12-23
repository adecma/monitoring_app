<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Periode;
use App\RegistrasiMahasiswa;
use App\Kompetensi;
use Auth;
use App\Aspek;
use Validator;

class KuisionerMahasiswaController extends Controller
{
	public function index()
	{
		$katalog = Periode::with([
				'semesters' => function($s){$s->with([
					'registrasi_matakuliah' => function($r){
						$r->whereHas('registrasi_mahasiswa', function($m){
							$m->whereUserId(Auth::user()->id);
						});
					}
				]);}
			])
			->orderBy('name', 'desc')
			->get();

		return view('kuisioner.index', compact('katalog')); 
	}

	public function show($id)
	{
		$regMhs = RegistrasiMahasiswa::where('registrasi_matakuliah_id', '=', $id)
			->where('user_id', '=', Auth::user()->id)
			->firstOrFail();
		$kuisioner = Kompetensi::with('aspeks')->get();

		$no = 1;

		return view('kuisioner.show', compact('regMhs', 'kuisioner', 'no'));
	}

	public function store(Request $request, $id)
	{
		//dd($request->input('nilai'));
		$regMhs = RegistrasiMahasiswa::where('registrasi_matakuliah_id', '=', $id)
			->where('user_id', '=', Auth::user()->id)
			->firstOrFail();

		$aspeks = Aspek::all();

		foreach($aspeks as $aspek)
		{
			$rules['nilai.'.$aspek->id] = 'required';
		}

		$validator = Validator::make($request->all(), $rules);

		if($validator->fails())
		{
			flash()->error('Masih ada beberapa pernyataan kuisioner yang belum terjawab');

			return redirect()->route('katalog.show', $id)
				->withErrors($validator)
                ->withInput();
		}

		foreach ($request->input('nilai') as $key => $value) {
			$answer[$key] = ['skor' => $value];
		}

		$regMhs->aspeks()->attach($answer);

		flash()->success('Jawaban untuk kuisioner untuk matakuliah '.$regMhs->registrasi_matakuliah->matakuliah->name.' tersimpan');

		return redirect()->route('katalog.show', $regMhs->registrasi_matakuliah->id);
	}                      
}