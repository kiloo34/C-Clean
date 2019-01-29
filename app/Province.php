<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    protected $fillable = [
        'id',
        'name'
    ];

    public $timestamps = false;

    public function cities()
    {
        return $this->hasMany('App\City', 'province_id');
    }

    public function alamat()
    {
        return $this->hasMany('App\Alamat', 'id_provinsi');
    }

    public function districts()
    {
        return $this->hasManyThrough('App\District', 'App\City');
    }
}
