<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Akses;
use App\Status;
use App\Akses_Detail;
use App\Akses_Role;
use Carbon\Carbon;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mutable = Carbon::today();
        $data = Role::all();
        // dd($mutable);
        return view('admin.akses.index', [
            'data'  => $data,
            'tgl'   =>$mutable
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.akses.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|unique:service'
        ]);

        Role::create([
            'nama'      => $request->nama
        ]);

        return redirect()->route('akses.index')->with('success', 'Hak Akses Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data       = Role::findOrFail($id);    //role
        $role_akses = Akses_Role::where([['id_role', $id], ['status', true]])->get();
        $akses      = Akses::all(); //get akses

        return view('admin.akses.detail', [
            'data'      => $data,
            'role_akses'=> $role_akses,
            'akses'     => $akses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tambahAkses(Request $r, Role $role, $id)//Create Akses
    {   
        // dd($id, $role->id);
        // dd($role);
        $check  = Akses_Role::where([['id_role', $role->id], ['id_detail', $id]])->first();
        // dd(isset($check));
        
        $r->validate([
            'id_detail' => 'required|numeric'
        ]);
        
        if (isset($check)) {
            if ($check->status == false) {
                $check->update([
                    'status'    => true
                ]);
            } else {
                $r->validate([
                    'id_detail' => 'required|numeric|unique:role_akses'
                ]); 
            }
        } else {
            Akses_Role::create([
                'status'    => true,
                'id_role'   => $role->id,
                'id_detail' => $r->id_detail
            ]);
        }

        return redirect()->route('akses.show', $role->id)->with('success', 'Menu Berhasil Ditambahkan !');
    }

    public function getDetailAkses($id)//ajax
    {
        $detail     = Akses_Detail::where('id_akses', $id)->get();
        echo "<option selected> Choose One</option>";
        foreach ($detail as $d) {
            echo "<option value=".$d->id.">$d->nama</option>";
        }
    }

    public function UpdateAkses(Request $r, Role $role, $id)
    {
        // $akses  = Akses_Role::findOrFail($id);
        $role   = Akses_Role::where([['id_role', $role->id], ['id_detail', $id]]);
        // dd($role);
        $role->update([
            'status'    => 0,
        ]);

        return redirect()->back()->with('success', 'Akses Berhasil Dihapus');
    }
}