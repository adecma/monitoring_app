<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Html\Builder;
use Datatables;
use DB;

use App\Aspek;
use App\Kompetensi;

class AspekController extends Controller
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

            $aspeks = Aspek::select([DB::raw('@nomor := @nomor+1 as nomor'), 'aspeks.id', 'aspeks.name', 'aspeks.updated_at', 'kompetensis.name as kompetensi'])
            	->join('kompetensis', 'aspeks.kompetensi_id', '=', 'kompetensis.id');

            $dataAspeks = Datatables::of($aspeks)
                ->addColumn('action', function($aspeks){
                    return view('master.aspek._aksi', [
                        'form_url' => route('aspek.destroy', $aspeks->id),
                        'edit_url' => route('aspek.edit', $aspeks->id),
                    ]);
                })
                ->editColumn('updated_at', function($aspeks){
                    return $aspeks->updated_at->diffForHumans();
                });

            if ($keyword = $request->get('search')['value']) {
                $dataAspeks->filterColumn('nomor', 'whereRaw', '@nomor + 1 like ?', ["%{$keyword}%"]);
            }

            return $dataAspeks->make(true);
        }

        $html = $htmlBuilder
            ->addcolumn(['data' => 'nomor', 'name' => 'nomor', 'title' => 'No.'])
            ->addcolumn(['data' => 'name', 'name' => 'aspeks.name', 'title' => 'Aspek'])
            ->addcolumn(['data' => 'kompetensi', 'name' => 'kompetensis.name', 'title' => 'Kompetensi'])
            ->addcolumn(['data' => 'updated_at', 'name' => 'aspeks.updated_at', 'title' => 'Diperbaharui'])
            ->addcolumn(['data' => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => false]);

        return view('master.aspek.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$kompetensis = Kompetensi::pluck('name', 'id');

        return view('master.aspek.create', compact('kompetensis'));
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
            'name' => 'required|unique:aspeks,name',
            'kompetensi' => 'required',
        ]);

        $aspek = new Aspek;
        $aspek->name = $request->input('name');
        $aspek->kompetensi_id = $request->input('kompetensi');
        $aspek->save(); 

        flash()->success('Aspek '.$request->input('name').' tersimpan');

        return redirect()->route('aspek.index');
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
        $aspek = Aspek::findOrFail($id);

        $kompetensis = Kompetensi::pluck('name', 'id');

        return view('master.aspek.edit', compact('aspek', 'kompetensis'));
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
        $aspek = Aspek::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:aspeks,name,'.$aspek->id,
            'kompetensi' => 'required',
        ]);

        $aspek->name = $request->input('name');
        $aspek->kompetensi_id = $request->input('kompetensi');
        $aspek->save();

        flash()->success('Aspek '.$request->input('name').' diperbaharui');

        return redirect()->route('aspek.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aspek = Aspek::findOrFail($id);

        $aspek->delete();

        flash()->success('Aspek '.$aspek->name.' telah di hapus');

        return redirect()->route('aspek.index');
    }
}
