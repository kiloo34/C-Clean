<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'id',
        'total',
        'deskripsi',
        'id_member',
        'id_admin',
    ];

    public $timestamps = true;

    public function admin()
    {
        return $this->belongsTo('App\Admin', 'id_admin');
    }

    public function member()
    {
        return $this->belongsTo('App\Member', 'id_member');
    }

    public function order_detail()
    {
        return $this->hasMany('App\Order_detail', 'id_order');
    }
}
