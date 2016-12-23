<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Html\Builder;
use Datatables;
use DB;

use App\Matakuliah;

class MatakuliahController extends Controller
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

            $matakuliahs = Matakuliah::select([DB::raw('@nomor := @nomor+1 as nomor'), 'kd', 'name', 'updated_at']);

            $dataMatakuliahs = Datatables::of($matakuliahs)
                ->addColumn('action', function($matakuliahs){
                    return view('master.matakuliah._aksi', [
                        'form_url' => route('matakuliah.destroy', $matakuliahs->kd),
                        'edit_url' => route('matakuliah.edit', $matakuliahs->kd),
                    ]);
                })
                ->editColumn('updated_at', function($matakuliahs){
                    return $matakuliahs->updated_at->diffForHumans();
                });

            if ($keyword = $request->get('search')['value']) {
                $dataMatakuliahs->filterColumn('nomor', 'whereRaw', '@nomor + 1 like ?', ["%{$keyword}%"]);
            }

            return $dataMatakuliahs->make(true);
        }

        $html = $htmlBuilder
            ->addcolumn(['data' => 'nomor', 'name' => 'nomor', 'title' => 'No.'])
            ->addcolumn(['data' => 'kd', 'name' => 'kd', 'title' => 'Kode'])
            ->addcolumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama'])
            ->addcolumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated'])
            ->addcolumn(['data' => 'action', 'name' => 'action', 'title' => 'action', 'orderable' => false, 'searchable' => false]);

        return view('master.matakuliah.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.matakuliah.create');
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
        	'kd' => 'required',
            'name' => 'required',
        ]);

        $matakuliah = new Matakuliah;
        $matakuliah->kd = strtoupper($request->input('kd'));
        $matakuliah->name = $request->input('name');
        $matakuliah->save(); 

        flash()->success('Matakuliah '.$request->input('name').' tersimpan');

        return redirect()->route('matakuliah.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $kd
     * @return \Illuminate\Http\Response
     */
    public function show($kd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $kd
     * @return \Illuminate\Http\Response
     */
    public function edit($kd)
    {
        $matakuliah = Matakuliah::findOrFail($kd);

        return view('master.matakuliah.edit', compact('matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $kd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kd)
    {
        $matakuliah = Matakuliah::findOrFail($kd);

        $this->validate($request, [
            'kd' => 'required|unique:matakuliahs,kd,'.$matakuliah->kd.',kd',
            'name' => 'required',
        ]);

        $matakuliah->kd = strtoupper($request->input('kd'));
        $matakuliah->name = $request->input('name');
        $matakuliah->save();

        flash()->success('Matakuliah '.$request->input('name').' diperbaharui');

        return redirect()->route('matakuliah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $kd
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd)
    {
        $matakuliah = Matakuliah::findOrFail($kd);

        $matakuliah->delete();

        flash()->success('Matakuliah '.$matakuliah->name.' telah di hapus');

        return redirect()->route('matakuliah.index');
    }
}
