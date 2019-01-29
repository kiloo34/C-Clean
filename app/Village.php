<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'villages';
    
    protected $fillable = [
        'id',
        'name',
        'district_id'
    ];

    public $timestamps = false;

	public function district()
	{
	    return $this->belongsTo('App\District', 'district_id');
    }
    
    public function alamat()
    {
        return $this->hasMany('App\Alamat', 'id_desa');
    }
}
