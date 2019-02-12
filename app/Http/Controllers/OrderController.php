<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Service;
use App\Produk;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::with('order_detail', 'admin')->get();
        // dd($data);
        return view('admin.order.index', [
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
        $service = Service::get();
        $dt = Carbon::now();
        
        // $produk = Produk::where()->get();

        return view('admin.order.tambah', [
            'service'   => $service,
            'dt'        => $dt,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function getProduk($id)
    {
        $produk = Produk::where('id_service', $id)->get();
        echo "<option selected> Choose One</option>";
        foreach ($produk as $p){
            echo "<option class='produk-".$p->id."' value='".$p->id."'> ".$p->nama." </option>";
        }
    }

    public function getDetailProduk(Service $service, $id)
    {
        $detail = Produk::where([['id_service', $service->id], ['id', $id]])->first();

        // dd(json_encode($detail));

        $return_arr['id'] = $detail->id;
        $return_arr['nama'] = $detail->nama;
        $return_arr['harga'] = $detail->harga;
        $return_arr['durasi'] = $detail->durasi;
        
        // echo json_encode($return_arr);
        $data['items'] = $return_arr;
        // dd($data);
        echo json_encode(Produk::where([['id_service', $service->id], ['id', $id]])->first());
        exit;
        
        // if(!empty($item)){
                
        //     $data['status_no'] = 1;
        //     $data['message']   ='Item Found';

        //     $i = 0;
        //     foreach ($item as $d) {
        //         $itemPriceValue = DB::table('sale_prices')->where(['stock_id'=>$value->stock_id,'sales_type_id'=>$request['salesTypeId']])->select('price')->first();
        //         if(!isset($itemPriceValue)){
        //             $itemSalesPriceValue = 0;
        //         }else{
        //             $itemSalesPriceValue = $itemPriceValue->price;
        //         }

        //         $return_arr[$i]['id'] = $value->id;
        //         $return_arr[$i]['stock_id'] = $value->stock_id;
        //         $return_arr[$i]['description'] = $value->description;
        //         $return_arr[$i]['units'] = $value->units;
        //         $return_arr[$i]['price'] = $itemSalesPriceValue;
        //         $return_arr[$i]['tax_rate'] = $value->tax_rate;
        //         $return_arr[$i]['tax_id'] = $value->tax_id;

        //         $i++;
        //     }
        //     //echo json_encode($return_arr);
        //      $data['items'] = $return_arr;
        // }
        // echo json_encode($data);
        // exit;
        
        // echo 
        // "<tr>
        //     <td>".$detail->nama."</td>
        //     <td>".$detail->harga."</td>
        //     <td onkeyup=hitungttl()><input type=text name=total placeholder='satuan Per Kg'></td>
        //     <td></td>
        //     <td></td>
        // </tr>";
    }
}
