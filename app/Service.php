<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';

    protected $fillable = [
        'id',
        'nama'
    ];

    public $timestamps = false;
    
    public function produk()
    {
        return $this->hasMany('App\Produk', 'id_service');
    }
}
