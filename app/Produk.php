<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'id',
        'nama', 
        'durasi',
        'harga',
        'id_service'
    ];

    public $timestamps = false;

    public function order_detail()
    {
        return $this->hasMany('App\Order_detail', 'id_produk');
    }
    
    public function service()
    {
        return $this->belongsTo('App\Service', 'id_service');
    }
}
