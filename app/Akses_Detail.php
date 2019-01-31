<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akses_Detail extends Model
{
    protected $table = 'detail_akses';

    protected $fillable = [
        'id',
        'nama',
    ];

    public $timestamps = false;

    public function akses()
    {
        return $this->belongsToMany('App\Akses');
    }

    public function status()
    {
        return $this->hasMany('App\Status', 'id_detail');
    }
}
