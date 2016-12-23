<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Html\Builder;
use Datatables;
use DB;

use App\Periode;
use App\Semester;

class PeriodeController extends Controller
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

            $periodes = Periode::select([DB::raw('@nomor := @nomor+1 as nomor'), 'id', 'name', 'updated_at']);

            $dataPeriodes = Datatables::of($periodes)
            	->addColumn('semester', function($periodes){
            		$semester = $periodes->semesters;
            		return view('master.periode._semester', compact('semester'));
            	})
                ->addColumn('action', function($periodes){
                    return view('master.periode._aksi', [
                        'form_url' => route('periode.destroy', $periodes->id),
                        'edit_url' => route('periode.edit', $periodes->id),
                    ]);
                })
                ->editColumn('updated_at', function($periodes){
                    return $periodes->updated_at->diffForHumans();
                });

            if ($keyword = $request->get('search')['value']) {
                $dataPeriodes->filterColumn('nomor', 'whereRaw', '@nomor + 1 like ?', ["%{$keyword}%"]);
            }

            return $dataPeriodes->make(true);
        }

        $html = $htmlBuilder
            ->addcolumn(['data' => 'nomor', 'name' => 'nomor', 'title' => 'No.'])
            ->addcolumn(['data' => 'name', 'name' => 'name', 'title' => 'Periode'])
            ->addcolumn(['data' => 'semester', 'name' => 'semester', 'title' => 'Semester', 'orderable' => false, 'searchable' => false])
            ->addcolumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated'])
            ->addcolumn(['data' => 'action', 'name' => 'action', 'title' => 'action', 'orderable' => false, 'searchable' => false]);

        return view('master.periode.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.periode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:periodes,name',
        ]);

        $periode = new Periode;
        $periode->name = $request->input('name');
        $periode->save(); 

        $dataSemesters = [
        	[
        		'jenis' => 'Ganjil',
        		'status' => 'Non',
        	],
        	[
        		'jenis' => 'Genap',
        		'status' => 'Non',
        	]
        ];

        foreach ($dataSemesters as $semester) {
        	$s = new Semester;
        	$s->jenis = $semester['jenis'];
        	$s->status = $semester['status'];
        	$s->periode_id = $periode->id;
        	$s->save();
        }

        flash()->success('Periode '.$request->input('name').' tersimpan');

        return redirect()->route('periode.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periode = Periode::findOrFail($id);

        return view('master.periode.edit', compact('Periode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $periode = Periode::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:periodes,name,'.$periode->id,
        ]);

        $periode->name = $request->input('name');
        $periode->save();

        flash()->success('Periode '.$request->input('name').' diperbaharui');

        return redirect()->route('periode.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periode = Periode::findOrFail($id);

        $periode->delete();

        flash()->success('Periode '.$periode->name.' telah di hapus');

        return redirect()->route('periode.index');
    }

    /**
     * Set Aktif for semester
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function aktifkan(Request $request, $id)
    {
    	$nonSemester = Semester::whereStatus('Aktif')->first();
        if ($nonSemester) {
            $nonSemester->status = 'Non';
            $nonSemester->save();
        }    	

    	$semester = Semester::findOrFail($id);
    	$semester->status = 'Aktif';
    	$semester->save();

    	flash()->success('Semester '.$semester->jenis.' periode '.$semester->periode->name.' diaktifkan');

    	return redirect()->route('periode.index');
    }
}
