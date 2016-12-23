<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Html\Builder;
use Datatables;
use DB;

use App\Kompetensi;

class KompetensiController extends Controller
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

            $kompetensis = Kompetensi::select([DB::raw('@nomor := @nomor+1 as nomor'), 'id', 'name', 'updated_at']);

            $dataKompetensis = Datatables::of($kompetensis)
                ->addColumn('action', function($kompetensis){
                    return view('master.kompetensi._aksi', [
                        'form_url' => route('kompetensi.destroy', $kompetensis->id),
                        'edit_url' => route('kompetensi.edit', $kompetensis->id),
                    ]);
                })
                ->editColumn('updated_at', function($kompetensis){
                    return $kompetensis->updated_at->diffForHumans();
                });

            if ($keyword = $request->get('search')['value']) {
                $dataKompetensis->filterColumn('nomor', 'whereRaw', '@nomor + 1 like ?', ["%{$keyword}%"]);
            }

            return $dataKompetensis->make(true);
        }

        $html = $htmlBuilder
            ->addcolumn(['data' => 'nomor', 'name' => 'nomor', 'title' => 'No.'])
            ->addcolumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama'])
            ->addcolumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated'])
            ->addcolumn(['data' => 'action', 'name' => 'action', 'title' => 'action', 'orderable' => false, 'searchable' => false]);

        return view('master.kompetensi.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.kompetensi.create');
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
            'name' => 'required|unique:kompetensis,name',
        ]);

        $kompetensi = new Kompetensi;
        $kompetensi->name = $request->input('name');
        $kompetensi->save(); 

        flash()->success('Kompetensi '.$request->input('name').' tersimpan');

        return redirect()->route('kompetensi.index');
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
        $kompetensi = Kompetensi::findOrFail($id);

        return view('master.kompetensi.edit', compact('kompetensi'));
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
        $kompetensi = Kompetensi::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:kompetensis,name,'.$kompetensi->id,
        ]);

        $kompetensi->name = $request->input('name');
        $kompetensi->save();

        flash()->success('Kompetensi '.$request->input('name').' diperbaharui');

        return redirect()->route('kompetensi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kompetensi = Kompetensi::findOrFail($id);

        $kompetensi->delete();

        flash()->success('Kompetensi '.$kompetensi->name.' telah di hapus');

        return redirect()->route('kompetensi.index');
    }
}
