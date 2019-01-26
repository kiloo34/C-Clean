<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Service;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::with('service')->get();

        return view('admin.produk.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Service::get();

        return view('admin.produk.tambah', [
            'data' => $data
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
            'nama'      =>  'required|string|unique:product',
            'durasi'    =>  'required|numeric',
            'harga'     =>  'required|numeric',
            'service'   =>  'required|numeric'
        ]);

        Produk::create([
            'nama'      =>  $r->nama,
            'durasi'    =>  $r->durasi,
            'harga'     =>  $r->harga,
            'id_service'=>  $r->service
        ]);

        return redirect()->route('produk.index')->with('msg_success', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::with('service')->findOrFail($id);
        $data = Service::get();

        return view('admin.produk.ubah', [
            'produk'    => $produk,
            'data'      => $data
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
        $produk = Produk::findOrFail($id);
        // dd($produk);
        $r->validate([
            'nama'      => 'required|string',
            'durasi'    => 'required|numeric',
            'harga'     => 'required|numeric',
        ]);

        $produk->update([
            'nama'  => $r->nama,
            'durasi'=> $r->durasi,
            'harga' => $r->harga
        ]);

        return redirect()->route('produk.index')->with('msg_success', 'Produk Berhasi di Perbarui ');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('msg_success', 'Produk Berhasil di Hapus');
    }
}
