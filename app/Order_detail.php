<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_detail';

    protected $fillable = [
        'id',
        'harga',
        'kuantitas',
        'total',
        'id_order',
        'id_produk'
    ];

    public $timestamps = false;

    public function order()
    {
        return $this->hasOne('App\Order', 'id_order');
    }

    public function produk()
    {
        return $this->hasMany('App\Produk', 'id_produk');
    }
}
