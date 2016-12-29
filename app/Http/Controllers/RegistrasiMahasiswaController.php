<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Html\Builder;
use Datatables;
use DB;

use App\RegistrasiMahasiswa;
use App\RegistrasiMatakuliah;
use App\User;

use Laratrust;
use PDF;

class RegistrasiMahasiswaController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder, $idA, $idB)
    {
    	$reg = RegistrasiMatakuliah::whereHas('semester', function($s) use($idA) {$s->where('periode_id', '=', $idA);})->findOrFail($idB);
    	
    	if ($request->ajax()) {
            DB::statement(DB::raw('set @nomor = 0'));

            $mahasiswas = RegistrasiMahasiswa::select([
                    DB::raw('@nomor := @nomor+1 as nomor'), 
                    'registrasi_mahasiswa.id', 
                    'users.name', 
                    'users.no_induk', 
                    DB::raw("(select sum(skor) from aspek_nilai where aspek_nilai.registrasi_mahasiswa_id=registrasi_mahasiswa.id) as skor")
                ])
            	->join('users', 'registrasi_mahasiswa.user_id', '=', 'users.id')
            	->where('registrasi_mahasiswa.registrasi_matakuliah_id', '=', $reg->id);

            $dataMahasiswas = Datatables::of($mahasiswas);

            if (Laratrust::hasRole('admin')) {
                $dataMahasiswas->addColumn('action', function($mahasiswas) use($reg){
                    return view('registrasi.mahasiswa._aksi', [
                        'form_url' => route('registrasi_mahasiswa.destroy', [$reg->semester->periode->id, $reg->id, $mahasiswas->id]),
                    ]);
                });
            }

            if ($keyword = $request->get('search')['value']) {
                $dataMahasiswas->filterColumn('nomor', 'whereRaw', '@nomor + 1 like ?', ["%{$keyword}%"]);
            }

            return $dataMahasiswas->make(true);
        }

        $html = $htmlBuilder
            ->addcolumn(['data' => 'nomor', 'name' => 'nomor', 'title' => 'No.'])
            ->addcolumn(['data' => 'no_induk', 'name' => 'users.no_induk', 'title' => 'NIM'])
            ->addcolumn(['data' => 'name', 'name' => 'users.name', 'title' => 'Nama'])
            ->addcolumn(['data' => 'skor', 'name' => 'skor', 'title' => 'Skor', 'searchable' => false]);

        if (Laratrust::hasRole('admin')) {
            $html->addcolumn(['data' => 'action', 'name' => 'action', 'title' => 'action', 'orderable' => false, 'searchable' => false]);
        }

        return view('registrasi.mahasiswa.index', compact('reg', 'html'));
    }

    public function create($idA, $idB)
    {
    	$reg = RegistrasiMatakuliah::whereHas('semester', function($s) use($idA) {$s->where('periode_id', '=', $idA);})->findOrFail($idB);

    	$mahasiswas = User::select(['id', DB::raw("concat(no_induk, ' - ', name) as name")])
    		->whereHas('roles', function($r){
    			$r->whereName('mahasiswa');
    		})
    		->whereHas('jurusan', function($j) use($reg){
    			$j->where('kd', '=', $reg->jurusan_kd);
    		})
    		->whereNotExists(function ($m) use($reg){
    			$m->select(DB::raw(1))
    			->from('registrasi_mahasiswa')
    			->whereRaw('registrasi_mahasiswa.user_id = users.id')
    			->where('registrasi_mahasiswa.registrasi_matakuliah_id', '=', $reg->id);
    		})
    		->pluck('name', 'id');

    	return view('registrasi.mahasiswa.create', compact('reg', 'mahasiswas'));
    }

    public function store(Request $request, $idA, $idB)
    {
    	$reg = RegistrasiMatakuliah::whereHas('semester', function($s) use($idA) {$s->where('periode_id', '=', $idA);})->findOrFail($idB);

    	$this->validate($request, [
            'mahasiswa' => 'required',
        ]);

        foreach ($request->input('mahasiswa') as $mhs) {
        	$r = new RegistrasiMahasiswa;
        	$r->registrasi_matakuliah_id = $reg->id;
        	$r->user_id = $mhs;
        	$r->save();
        }

        flash()->success('Registrasi mahasiswa tersimpan');

        return redirect()->route('registrasi_mahasiswa.index', [$idA, $idB]);
    }

    public function destroy($idA, $idB, $id)
    {
    	$reg = RegistrasiMatakuliah::whereHas('semester', function($s) use($idA) {$s->where('periode_id', '=', $idA);})->findOrFail($idB);

    	$r = RegistrasiMahasiswa::findOrFail($id);
    	$r->delete();

    	flash()->success('Registrasi mahasiswa  telah di hapus');

    	return redirect()->route('registrasi_mahasiswa.index', [$idA, $idB]);
    }

    public function toPDF($idA, $idB, $time)
    {
        $reg = RegistrasiMatakuliah::whereHas('semester', function($s) use($idA) {$s->where('periode_id', '=', $idA);})->findOrFail($idB);

        $mahasiswas = RegistrasiMahasiswa::select([ 
                    'registrasi_mahasiswa.id', 
                    'users.name', 
                    'users.no_induk', 
                    DB::raw("(select sum(skor) from aspek_nilai where aspek_nilai.registrasi_mahasiswa_id=registrasi_mahasiswa.id) as skor")
                ])
                ->join('users', 'registrasi_mahasiswa.user_id', '=', 'users.id')
                ->where('registrasi_mahasiswa.registrasi_matakuliah_id', '=', $reg->id)
                ->get();

        $no = 1;

        $pdf = PDF::loadView('registrasi.mahasiswa.toPdf',compact('mahasiswas', 'reg', 'no'))
            ->setPaper('a4', 'potrait');
 
        return $pdf->stream('reportRegistrasiMahasiswa-'.$time.'.pdf');
    }
}
