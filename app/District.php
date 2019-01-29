<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    
    protected $fillable = [
        'id',
        'city_id',
        'name'
    ];

    public $timestamps = false;

    public function city()
	{
	    return $this->belongsTo('App\City', 'city_id');
	}

	public function villages()
    {
        return $this->hasMany('App\Village', 'district_id');
    }

    public function alamat()
    {
        return $this->hasMany('App\Alamat', 'id_kecamatan');
    }
}
