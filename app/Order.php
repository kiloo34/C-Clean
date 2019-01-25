<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'id',
        'id_member',
        'id_admin',
    ];

    public $timestamps = true;

    public function admin()
    {
        return $this->belongsTo('App\Admin', 'id_admin', 'other_key');
    }

    public function member()
    {
        return $this->belongsTo('App\Member', 'id_member', 'other_key');
    }

    public function order_detail()
    {
        return $this->belongsTo('App\Order_detail', 'id_order');
    }
}
