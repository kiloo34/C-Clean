<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cabang;
use App\Alamat;
use App\Province;
use App\City;
use App\District;
use App\Village;
use DB;
use Indonesia;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cabang::with('alamat')->get();
        // dd($data);
        return view('admin.cabang.index', [
            'data'  => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Province::get();
        
        return view('admin.cabang.tambah', [
            'data'  => $data
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
            'nama'      => 'required|string',
            'alamat'    => 'required|string',
            'no_telp'   => 'required|numeric',
            'provinsi'  => 'required|numeric',
            'kabupaten' => 'required|numeric',
            'kecamatan' => 'required|numeric',
            'desa'      => 'required|numeric'
        ]);
        // dd($r->alamat);

        // DB::statement('set foreign_key_checks=0;');

        $alamat = Alamat::create([
            'nama'          => $r->alamat,
            'id_provinsi'   => $r->provinsi,
            'id_kabupaten'  => $r->kabupaten,
            'id_desa'       => $r->desa,
            'id_kecamatan'  => $r->kecamatan
        ]);
        // dd($alamat->id);
        Cabang::create([
            'nama'      => $r->nama,
            'id_alamat' => $alamat->id,
            'no_telp'   => $r->no_telp,
        ]);
        
        return redirect()->route('cabang.index')->with('success', 'Cabang Berhasil Ditambahkan !');
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
        $data = Cabang::with('alamat')->where('id', $id)->first();
        $provinsi = Province::all();
        // dd($data);
        return view('admin.cabang.ubah', [
            'data'      => $data,
            'provinsi'  => $provinsi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Cabang $cabang)
    {
        // $cabang = Cabang::findOrFail($id);
        $alamat = Alamat::findOrFail($cabang->id_alamat);
        // dd($alamat);
        $r->validate([
            'nama'      => 'required|string',
            'alamat'    => 'required|string',
            'no_telp'   => 'required|numeric',
            'provinsi'  => 'required|numeric',
            'kabupaten' => 'required|numeric',
            'kecamatan' => 'required|numeric',
            'desa'      => 'required|numeric'
        ]);

        $cabang->alamat()->update([
            'nama'          => $r->alamat,
            'id_provinsi'   => $r->provinsi,
            'id_kabupaten'  => $r->kabupaten,
            'id_kecamatan'  => $r->kecamatan,
            'id_desa'       => $r->desa,
        ]);

        $cabang->update([
            'nama'      => $r->nama,
            'id_alamat' => $alamat->id,
            'no_telp'   => $r->no_telp,
        ]);

        return redirect()->route('cabang.index')->with('success', 'Cabang Berhasi di Perbarui !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cabang = Cabang::findOrFail($id);
        $cabang->delete();

        return redirect()->route('cabang.index')->with('success', 'Cabang Berhasi di Dihapus !');   
    }

    public function kabupaten($id)
    {
        $kabupaten = City::where('province_id', $id)->get();
        // dd($kabupaten);
        foreach ($kabupaten as $kab){
            echo "<option value='".$kab->id."'> ".$kab->name." </option>";
        }
    }

    public function kecamatan($id)
    {
        $kecamatan = District::where('city_id', $id)->get();
        // dd($kecamatan);
        foreach ($kecamatan as $k){
            echo "<option value='".$k->id."'> ".$k->name." </option>";
        }
    }

    public function desa($id)
    {
        $desa = Indonesia::allVillages()->where('district_id', $id);
        foreach ($desa as $d){
            echo "<option value='".$d->id."'> ".$d->name." </option>";
        }
    }
}