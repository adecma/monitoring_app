<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Html\Builder;
use Datatables;
use DB;

use App\RegistrasiMatakuliah;
use App\Periode;
use App\Semester;
use App\Jurusan;
use App\Matakuliah;
use App\User;
use Laratrust;
use PDF;

class RegistrasiMatakuliahController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {   	
        if ($request->ajax()) {
            DB::statement(DB::raw('set @nomor = 0'));

            $periodes = Periode::select([DB::raw('@nomor := @nomor+1 as nomor'), 'id', 'name']);

            $dataPeriodes = Datatables::of($periodes)
                ->addColumn('action', function($periodes){
                    return '<a href="'.route('registrasi_matakuliah.show', $periodes->id).'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>';
                })
                ->editColumn('name', function($n){
                    return '<a href="'.route('registrasi_matakuliah.show', $n->id).'">'.$n->name.'</a>';
                });

            if ($keyword = $request->get('search')['value']) {
                $dataPeriodes->filterColumn('nomor', 'whereRaw', '@nomor + 1 like ?', ["%{$keyword}%"]);
            }

            return $dataPeriodes->make(true);
        }

        $html = $htmlBuilder
            ->addcolumn(['data' => 'nomor', 'name' => 'nomor', 'title' => 'No.'])
            ->addcolumn(['data' => 'name', 'name' => 'name', 'title' => 'Periode'])
            ->addcolumn(['data' => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => false]);

        return view('registrasi.matakuliah.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idP)
    {
    	$periode = Periode::findOrFail($idP);

    	$semesters = Semester::where('periode_id', '=', $periode->id)->pluck('jenis', 'id');

    	$jurusans = Jurusan::pluck('name', 'kd');
    	$matakuliahs = Matakuliah::select(['kd', DB::raw("concat(kd, ' - ', name) as name")])->pluck('name', 'kd');
    	$dosens = User::whereHas('roles', function($roles){$roles->whereName('dosen');})->pluck('name', 'id');

        return view('registrasi.matakuliah.create', compact('periode', 'semesters', 'jurusans', 'matakuliahs', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idP)
    {    	
        $this->validate($request, [
            'semester' => 'required',
            'jurusan' => 'required',
            'semes' => 'required',
            'matakuliah' => 'required',
            'dosen' => 'required',
        ]);

        $r = new RegistrasiMatakuliah;
        $r->semester_id = $request->input('semester');
        $r->jurusan_kd = $request->input('jurusan');
        $r->semes = $request->input('semes');
        $r->matakuliah_kd = $request->input('matakuliah');
        $r->user_id = $request->input('dosen');
        $r->save(); 

        flash()->success('Registrasi matakuliah  tersimpan');

        return redirect()->route('registrasi_matakuliah.show', $idP);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Builder $htmlBuilder, $idP)
    {
    	$periode = Periode::findOrFail($idP);

        if ($request->ajax()) {
            DB::statement(DB::raw('set @nomor = 0'));

            $registrasiMatakuliahs = RegistrasiMatakuliah::select([
                    DB::raw('@nomor := @nomor+1 as nomor'), 
                    'registrasi_matakuliah.id', 
                    'semesters.jenis as semester', 
                    'semesters.status', 
                    'jurusans.name as jurusan', 
                    'registrasi_matakuliah.semes', 
                    'matakuliahs.kd as kd_mk', 
                    'matakuliahs.name as matakuliah', 
                    'users.name as dosen', 
                    DB::raw("(select sum(aspek_nilai.skor) from registrasi_mahasiswa inner join aspek_nilai on aspek_nilai.registrasi_mahasiswa_id=registrasi_mahasiswa.id where registrasi_mahasiswa.registrasi_matakuliah_id=registrasi_matakuliah.id) as skor"),
                    DB::raw("ROUND((select sum(aspek_nilai.skor) from registrasi_mahasiswa inner join aspek_nilai on aspek_nilai.registrasi_mahasiswa_id=registrasi_mahasiswa.id where registrasi_mahasiswa.registrasi_matakuliah_id=registrasi_matakuliah.id)/(SELECT COUNT(registrasi_mahasiswa.id) FROM registrasi_mahasiswa WHERE registrasi_mahasiswa.registrasi_matakuliah_id=registrasi_matakuliah.id), 2) as rerata")
                ])
            	->join('matakuliahs', 'registrasi_matakuliah.matakuliah_kd', '=', 'matakuliahs.kd')
            	->join('jurusans', 'registrasi_matakuliah.jurusan_kd', '=', 'jurusans.kd')
            	->join('users', 'registrasi_matakuliah.user_id', '=', 'users.id')
            	->join('semesters', 'registrasi_matakuliah.semester_id', '=', 'semesters.id')
            	->where('semesters.periode_id', '=', $periode->id);

            $dataRegistrasiMatakuliahs = Datatables::of($registrasiMatakuliahs)
                ->addColumn('action', function($r) use($periode) {
                    if (Laratrust::hasRole('admin')) {
                        return view('registrasi.matakuliah._aksi', [
                            'form_url' => route('registrasi_matakuliah.destroy', [$periode->id, $r->id]),
                            'edit_url' => route('registrasi_matakuliah.edit', [$periode->id, $r->id]),
                            'detail_url' => route('registrasi_mahasiswa.index', [$periode->id, $r->id]),
                            'print_url' => route('registrasi_mahasiswa.topdf', [$periode->id, $r->id, time()]),
                        ]);
                    }else{
                        return '<a href="'.route('registrasi_mahasiswa.index', [$periode->id, $r->id]).'" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Detail</a>';
                    }
                        
                })
                ->editColumn('kd_mk', function($r) use($periode){
                	return '<a href="'.route('registrasi_mahasiswa.index', [$periode->id, $r->id]).'">'.$r->kd_mk.' - '.$r->matakuliah.'</a>';
                })
                ->addColumn('total', function($t){
                	return $t->registrasi_mahasiswa->count().' Mhs';
                })
                ->editColumn('semester', function($s){
                	return view('registrasi.matakuliah._semester', compact('s'));
                })
                ->addColumn('kesimpulan', function($k){
                    if($k->rerata >= 28.0 AND $k->rerata <= 50.4){
                        $kesimpulan = 'Sangat Tidak Baik';
                    }elseif(($k->rerata >= 50.5 AND $k->rerata <= 72.8)){
                        $kesimpulan = 'Tidak Baik';
                    }                        
                    elseif(($k->rerata >= 72.9 AND $k->rerata <= 95.2)){
                        $kesimpulan = 'Cukup Baik';
                    }                        
                    elseif(($k->rerata >= 95.3 AND $k->rerata <= 117.6)){
                        $kesimpulan = 'Baik';
                    }                        
                    elseif(($k->rerata >= 117.7 AND $k->rerata <= 140.0)){
                        $kesimpulan = 'Sangat Baik';
                    }else{
                        $kesimpulan = 'Unknown';
                    }

                    return $kesimpulan;
                });

            if ($keyword = $request->get('search')['value']) {
                $dataRegistrasiMatakuliahs->filterColumn('nomor', 'whereRaw', '@nomor + 1 like ?', ["%{$keyword}%"]);
            }

            return $dataRegistrasiMatakuliahs->make(true);
        }

        $html = $htmlBuilder
            ->addcolumn(['data' => 'nomor', 'name' => 'nomor', 'title' => 'No.'])
            ->addcolumn(['data' => 'semester', 'name' => 'semesters.jenis', 'title' => 'Semester'])
            ->addcolumn(['data' => 'jurusan', 'name' => 'jurusans.name', 'title' => 'Jurusan'])
            ->addcolumn(['data' => 'semes', 'name' => 'registrasi_matakuliah.semes', 'title' => 'Smt'])
            ->addColumn(['data' => 'kd_mk', 'name' => 'matakuliahs.kd', 'title' => 'Matakuliah'])
            ->addColumn(['data' => 'dosen', 'name' => 'users.name', 'title' => 'Dosen'])
            ->addcolumn(['data' => 'total', 'name' => 'total', 'title' => 'Mhs', 'orderable' => false, 'searchable' => false])
            ->addcolumn(['data' => 'skor', 'name' => 'skor', 'title' => 'Skor', 'searchable' => false])
            ->addcolumn(['data' => 'rerata', 'name' => 'rerata', 'title' => 'Rerata', 'searchable' => false])
            ->addcolumn(['data' => 'kesimpulan', 'name' => 'kesimpulan', 'title' => 'Kesimpulan', 'orderable' => false, 'searchable' => false])
            ->addcolumn(['data' => 'action', 'name' => 'action', 'title' => 'Aksi..', 'orderable' => false, 'searchable' => false]);

        return view('registrasi.matakuliah.periode', compact('html', 'periode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idP, $id)
    {
    	$periode = Periode::findOrFail($idP);
    	$registrasi_matakuliah = RegistrasiMatakuliah::whereHas('semester', function($s) use($periode) {$s->where('periode_id', '=', $periode->id);})->findOrFail($id);

    	$semesters = Semester::where('periode_id', '=', $periode->id)->pluck('jenis', 'id');
    	$jurusans = Jurusan::orderBy('name', 'asc')->pluck('name', 'kd');
    	$matakuliahs = Matakuliah::select(['kd', DB::raw("concat(kd, ' - ', name) as name")])->orderBy('name', 'asc')->pluck('name', 'kd');
    	$dosens = User::whereHas('roles', function($roles){$roles->whereName('dosen');})->orderBy('name', 'asc')->pluck('name', 'id');

        return view('registrasi.matakuliah.edit', compact('registrasi_matakuliah', 'periode', 'semesters', 'jurusans', 'matakuliahs', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idP, $id)
    {
    	$periode = Periode::findOrFail($idP);
    	$r = RegistrasiMatakuliah::whereHas('semester', function($s) use($periode) {$s->where('periode_id', '=', $periode->id);})->findOrFail($id);

    	$this->validate($request, [
            'semester' => 'required',
            'jurusan' => 'required',
            'semes' => 'required',
            'matakuliah' => 'required',
            'dosen' => 'required',
        ]);

        $r->semester_id = $request->input('semester');
        $r->jurusan_kd = $request->input('jurusan');
        $r->semes = $request->input('semes');
        $r->matakuliah_kd = $request->input('matakuliah');
        $r->user_id = $request->input('dosen');
        $r->save(); 

        flash()->success('Registrasi matakuliah diperbaharui');

        return redirect()->route('registrasi_matakuliah.show', $idP);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idP, $id)
    {
    	$periode = Periode::findOrFail($idP);
        $r = RegistrasiMatakuliah::whereHas('semester', function($s) use($periode) {$s->where('periode_id', '=', $periode->id);})->findOrFail($id);

        $r->delete();

        flash()->success('Registrasi matakuliah  telah di hapus');

        return redirect()->route('registrasi_matakuliah.show', $idP);
    }

    public function toPDF($idP, $semester, $time)
    {
        $periode = Periode::findOrFail($idP);

        $registrasiMatakuliahs = RegistrasiMatakuliah::select([
                    'registrasi_matakuliah.id', 
                    'semesters.jenis as semester', 
                    'semesters.status', 
                    'jurusans.name as jurusan', 
                    'registrasi_matakuliah.semes', 
                    'matakuliahs.kd as kd_mk', 
                    'matakuliahs.name as matakuliah', 
                    'users.name as dosen', 
                    DB::raw("(select sum(aspek_nilai.skor) from registrasi_mahasiswa inner join aspek_nilai on aspek_nilai.registrasi_mahasiswa_id=registrasi_mahasiswa.id where registrasi_mahasiswa.registrasi_matakuliah_id=registrasi_matakuliah.id) as skor"),
                    DB::raw("ROUND((select sum(aspek_nilai.skor) from registrasi_mahasiswa inner join aspek_nilai on aspek_nilai.registrasi_mahasiswa_id=registrasi_mahasiswa.id where registrasi_mahasiswa.registrasi_matakuliah_id=registrasi_matakuliah.id)/(SELECT COUNT(registrasi_mahasiswa.id) FROM registrasi_mahasiswa WHERE registrasi_mahasiswa.registrasi_matakuliah_id=registrasi_matakuliah.id), 2) as rerata")
                ])
                ->join('matakuliahs', 'registrasi_matakuliah.matakuliah_kd', '=', 'matakuliahs.kd')
                ->join('jurusans', 'registrasi_matakuliah.jurusan_kd', '=', 'jurusans.kd')
                ->join('users', 'registrasi_matakuliah.user_id', '=', 'users.id')
                ->join('semesters', 'registrasi_matakuliah.semester_id', '=', 'semesters.id')
                ->where('semesters.periode_id', '=', $periode->id)
                ->where('semesters.id', '=', $semester)
                ->orderBy('rerata', 'desc')
                ->get();

        $no = 1;

        $pdf = PDF::loadView('registrasi.matakuliah.toPdf',compact('registrasiMatakuliahs', 'periode', 'no'))
            ->setPaper('a4', 'potrait');
 
        return $pdf->stream('reportRegistrasiMatakuliah-'.$time.'.pdf');
        //return view('registrasi.matakuliah.toPdf',compact('registrasiMatakuliahs', 'periode', 'no'));
    }
}
