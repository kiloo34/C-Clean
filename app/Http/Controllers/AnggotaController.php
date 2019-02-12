<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Alamat;
use App\Admin;
use App\Role;
use App\Cabang;
use App\Province;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Admin::all();
        $role   = Role::all();
        // dd($anggota);
        return view('admin.anggota.index', [
            'data'  => $anggota,
            'role'  => $role
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role   = Role::all();
        $cabang = Cabang::all();
        $provinsi = Province::all();

        return view('admin.anggota.tambah', [
            'role'      => $role,
            'cabang'    => $cabang,
            'provinsi'  => $provinsi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $r->validate([
            'email'     => 'required|string|max:255|unique:users',
            'nama'      => 'required|string',
            'jk'        => 'required|string',
            'alamat'    => 'required|string',
            'no_telp'   => 'required|numeric|unique:admin',
            'provinsi'  => 'required|numeric',
            'kabupaten' => 'required|numeric',
            'kecamatan' => 'required|numeric',
            'desa'      => 'required|numeric',
            'cabang'    => 'required|numeric',
            'peran'     => 'required|numeric',
        ]);

        $user = User::create([
            'email'     => $r->email,
            'password'  => bcrypt('123456'),
            'token'     => str_random(15),
            'id_role'   => $r->peran,
        ]);
        // dd('create user');
        $alamat = Alamat::create([
            'nama'          => $r->alamat,
            'id_provinsi'   => $r->provinsi,
            'id_kabupaten'  => $r->kabupaten,
            'id_desa'       => $r->desa,
            'id_kecamatan'  => $r->kecamatan
        ]);
        // dd('create alamat');
        Admin::create([
            'nama'      => $r->nama,
            'jk'        => $r->jk,
            'no_telp'   => $r->no_telp,
            'id_alamat' => $alamat->id,
            'id_user'   => $user->id,
            'id_cabang' => $r->cabang
        ]);
        // dd('create admin');
        return redirect()->route('anggota.index')->with('success', 'Anggota Berhasil Ditambahkan !');
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
}
