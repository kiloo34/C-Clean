<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamat';

    protected $fillable = [
        'id',
        'nama',
        'id_provinsi',
        'id_kabupaten',
        'id_kecamatan',
        'id_desa'
    ];

    public function cabang()
    {
        return $this->hasOne('App\Cabang', 'id_alamat');
    }

    public function kabupaten()
    {
        return $this->belongsTo('App\City', 'id_kabupaten');
    }

    public function provinsi()
    {
        return $this->belongsTo('App\Province', 'id_provinsi');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\District', 'id_kecamatan');
    }

    public function desa()
    {
        return $this->belongsTo('App\Village', 'id_desa');
    }
}
