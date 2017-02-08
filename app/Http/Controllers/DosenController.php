<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Html\Builder;
use Datatables;

use DB;

use App\User;
use App\Role;

class DosenController extends Controller
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

            $users = User::select([DB::raw('@nomor := @nomor+1 as nomor'), 'id', 'name', 'no_induk', 'email', 'updated_at'])
                ->whereHas('roles', function($r){
                    $r->where('name', '=', 'dosen');
                });

            $dataUsers = Datatables::of($users)
                ->editColumn('name', function($users){
                    return $users->name.'<br>'.$users->email;
                })
                ->addColumn('action', function($users){
                    return view('master.dosen._aksi', [
                        'form_url' => route('dosen.destroy', $users->id),
                        'edit_url' => route('dosen.edit', $users->id),
                    ]);
                })
                ->editColumn('updated_at', function($users){
                    return $users->updated_at->diffForHumans();
                });

            if ($keyword = $request->get('search')['value']) {
                $dataUsers->filterColumn('nomor', 'whereRaw', '@nomor + 1 like ?', ["%{$keyword}%"]);
            }

            return $dataUsers->make(true);
        }

        $html = $htmlBuilder
            ->addcolumn(['data' => 'nomor', 'name' => 'nomor', 'title' => 'No.'])
            ->addcolumn(['data' => 'no_induk', 'name' => 'no_induk', 'title' => 'No. Induk'])
            ->addcolumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama'])
            ->addcolumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Diperbaharui'])
            ->addcolumn(['data' => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => false]);

        return view('master.dosen.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.dosen.create');
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
            'name' => 'required',
            'no_induk' => 'required|max:12|unique:users,no_induk',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->no_induk = $request->input('no_induk');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $user->roles()->attach(3);  

        flash()->success('Dosen '.$request->input('name').' tersimpan');

        return redirect()->route('dosen.index');
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
        $user = User::findOrFail($id);

        return view('master.dosen.edit', compact('user'));
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
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'no_induk' => 'required|max:12|unique:users,no_induk,'.$user->id,
            'email' => 'required|unique:users,email,'.$user->id,
            'password' => 'min:6',
        ]);

        $user->name = $request->input('name');
        $user->no_induk = $request->input('no_induk');
        $user->email = $request->input('email');

        if ($request->has('password')) {
             $user->password = bcrypt($request->input('password'));
        }
       
        $user->save(); 

        flash()->success('Dosen '.$request->input('name').' diperbaharui');

        return redirect()->route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        flash()->success('Dosen '.$user->name.' telah di hapus');

        return redirect()->route('dosen.index');
    }
}
