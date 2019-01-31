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
        $status     = Status::with('akses', 'detail')->get();   //show list Menu
        $role_akses = Akses_Role::with('akses')->where('id_role', $id)->get();
        $akses      = Akses::all(); //get akses

        return view('admin.akses.detail', [
            'data'      => $data,
            'status'    => $status,
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
    public function update(Request $request, $id)
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

    public function tambahMenu(Request $r, Role $role)//Create Menu
    {
        $r->validate([
            'id_akses' => 'required|unique:role_akses'
        ]);

        Akses_Role::create([
            'id_role'   => $role->id,
            'id_akses'  => $r->nama
        ]);

        return redirect()->route('akses.show', $role->id)->with('success', 'Menu Berhasil Ditambahkan !');
    }

    public function tambahAkses(Request $r, Akses $akses)//Create Akses
    {   
        dd($akses);
        $r->validate([
            'nama' => 'required'
        ]);
        // dd($role->id);
        Akses_Role::create([
            'id_role'   => $role->id,
            'id_akses'  => $r->nama
        ]);

        return redirect()->route('akses.show', $role->id)->with('success', 'Menu Berhasil Ditambahkan !');
    }

    public function getDetailAkses($id)//ajax
    {
        $detail = Akses_Detail::where('id_akses', $id)->get();
        // dd($detail);
        foreach ($detail as $d) {
            echo "<option value=" . $d->id . ">$d->nama</option>";
        }
    }
}
