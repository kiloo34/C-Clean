<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'id',
        'province_id',
        'name'
    ];

    public $timestamps = false;

    public function province()
	{
	    return $this->belongsTo('App\Province', 'province_id');
	}

	public function districts()
    {
        return $this->hasMany('App\District', 'city_id');
    }

    public function alamat()
    {
        return $this->hasMany('App\Alamat', 'id_kabupaten');
    }

    public function villages()
    {
        return $this->hasManyThrough('App\Village', 'App\District');
    }
}
