<?php

namespace App\Http\Controllers;

use App\Service;
use App\Produk;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = [];
        $data = Service::with('produk')->get();
        // dd($data);
        return view('admin.service.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.tambah');
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
            'nama' => 'required|string|unique:service'
        ]);

        Service::create([
            'nama'      => $r->nama,
            'deskripsi' => $r->deskripsi
        ]);

        return redirect()->route('service.index')->with('success', 'Service Berhasi Di Tambah ');
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
        
        $data = Service::findOrFail($id);
        // dd($data);
        return view('admin.service.ubah', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $service = Service::findOrFail($id);

        $r->validate([
            'nama' => 'required|string|unique:service'
        ]);

        $service->update([
            'nama' => $r->nama
        ]);

        return redirect()->route('service.index')->with('success', 'Service Berhasi di Perbarui ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Service Berhasil di Hapus');
    }

    public function listProdukService($id)
    {
        // dd('masuk');
        $service = Service::find($id);
        $data = Produk::with('service')->where('id_service', $id)->get();
        // dd($service);
        return view('admin.produk.list-produk', [
            'data'      => $data,
            'service'   => $service
        ]);
    }
}
