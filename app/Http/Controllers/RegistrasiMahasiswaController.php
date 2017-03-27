<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Html\Builder;
use Datatables;
use DB;

use App\RegistrasiMahasiswa;
use App\RegistrasiMatakuliah;
use App\User;
use App\Aspek;
use App\Kompetensi;

use Laratrust;
use PDF;

class RegistrasiMahasiswaController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder, $idA, $idB)
    {
    	$reg = RegistrasiMatakuliah::whereHas('semester', function($s) use($idA) {$s->where('periode_id', '=', $idA);})->findOrFail($idB);

        $nilai = DB::table('aspek_nilai')
            ->join('registrasi_mahasiswa', 'aspek_nilai.registrasi_mahasiswa_id', '=', 'registrasi_mahasiswa.id')
            ->join(DB::raw("(SELECT aspeks.id, aspeks.kompetensi_id, aspeks.name AS aspek, kompetensis.name AS kompetensi FROM aspeks INNER JOIN kompetensis ON aspeks.kompetensi_id = kompetensis.id) AS t_aspeks"), function($a){$a->on('aspek_nilai.aspek_id', '=', 't_aspeks.id');})
            ->where('registrasi_mahasiswa.registrasi_matakuliah_id', '=', $reg->id)
            ->groupBy('t_aspeks.kompetensi_id')
            ->select(['aspek_nilai.id', 'aspek_nilai.registrasi_mahasiswa_id', 'aspek_nilai.aspek_id', 'aspek_nilai.skor', 'registrasi_mahasiswa.registrasi_matakuliah_id', 't_aspeks.kompetensi_id', 't_aspeks.kompetensi', DB::raw('SUM(aspek_nilai.skor) AS countSkor'), DB::raw('SUM(aspek_nilai.skor)/'.$reg->registrasi_mahasiswa->count().' AS rerataSkor')])
            ->get();
    	
    	if ($request->ajax()) {
            DB::statement(DB::raw('set @nomor = 0'));

            $mahasiswas = RegistrasiMahasiswa::select([
                    DB::raw('@nomor := @nomor+1 as nomor'), 
                    'registrasi_mahasiswa.id', 
                    'users.name', 
                    'users.no_induk',
                    'users.email', 
                    DB::raw("(select sum(skor) from aspek_nilai where aspek_nilai.registrasi_mahasiswa_id=registrasi_mahasiswa.id) as skor")
                ])
            	->join('users', 'registrasi_mahasiswa.user_id', '=', 'users.id')
            	->where('registrasi_mahasiswa.registrasi_matakuliah_id', '=', $reg->id);

            $dataMahasiswas = Datatables::of($mahasiswas)
                ->editColumn('name', function($n){
                    return $n->name.'<br>'.$n->email;
                });

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
            $html->addcolumn(['data' => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => false]);
        }

        return view('registrasi.mahasiswa.index', compact('reg', 'html', 'nilai'));
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

        /*$mahasiswas = RegistrasiMahasiswa::select([ 
                    'registrasi_mahasiswa.id', 
                    'users.name', 
                    'users.no_induk', 
                    DB::raw("(select sum(skor) from aspek_nilai where aspek_nilai.registrasi_mahasiswa_id=registrasi_mahasiswa.id) as skor")
                ])
                ->join('users', 'registrasi_mahasiswa.user_id', '=', 'users.id')
                ->where('registrasi_mahasiswa.registrasi_matakuliah_id', '=', $reg->id)
                ->get();*/

        $nilai = DB::table('aspek_nilai')
            ->join('registrasi_mahasiswa', 'aspek_nilai.registrasi_mahasiswa_id', '=', 'registrasi_mahasiswa.id')
            ->join(DB::raw("(SELECT aspeks.id, aspeks.kompetensi_id, aspeks.name AS aspek, kompetensis.name AS kompetensi FROM aspeks INNER JOIN kompetensis ON aspeks.kompetensi_id = kompetensis.id) AS t_aspeks"), function($a){$a->on('aspek_nilai.aspek_id', '=', 't_aspeks.id');})
            ->where('registrasi_mahasiswa.registrasi_matakuliah_id', '=', $reg->id)
            ->groupBy('t_aspeks.kompetensi_id')
            ->select(['aspek_nilai.id', 'aspek_nilai.registrasi_mahasiswa_id', 'aspek_nilai.aspek_id', 'aspek_nilai.skor', 'registrasi_mahasiswa.registrasi_matakuliah_id', 't_aspeks.kompetensi_id', 't_aspeks.kompetensi', DB::raw('SUM(aspek_nilai.skor) AS countSkor'), DB::raw('SUM(aspek_nilai.skor)/'.$reg->registrasi_mahasiswa->count().' AS rerataSkor')])
            ->get();

        $masterSkor = Aspek::with(['skor_mhs' => function($r) use($reg){$r->where('registrasi_mahasiswa.registrasi_matakuliah_id', '=', $reg->id);}])->get();

        $masterSumSkor = RegistrasiMahasiswa::where('registrasi_mahasiswa.registrasi_matakuliah_id', '=', $reg->id)
            ->select(['registrasi_mahasiswa.id', 'registrasi_mahasiswa.registrasi_matakuliah_id', 'registrasi_mahasiswa.user_id', DB::raw("(SELECT SUM(aspek_nilai.skor) FROM aspek_nilai WHERE aspek_nilai.registrasi_mahasiswa_id = registrasi_mahasiswa.id) AS sumSkor")])
            ->get();

        $kompetensis = Kompetensi::select(['id', 'name', DB::raw("(SELECT count(id) FROM aspeks WHERE aspeks.kompetensi_id=kompetensis.id) as countAspek")])->get();

        $no = 1;

        $pdf = PDF::loadView('registrasi.mahasiswa.toPdf-2',compact('nilai', 'reg', 'no', 'masterSkor', 'masterSumSkor', 'kompetensis'))
            ->setPaper('a4', 'landscape');
 
        return $pdf->stream('reportRegistrasiMahasiswa-'.$reg->id.'-'.$time.'.pdf');

        //return view('registrasi.mahasiswa.toPdf-2',compact('nilai', 'reg', 'no', 'masterSkor', 'masterSumSkor', 'kompetensis'));
    }
}
