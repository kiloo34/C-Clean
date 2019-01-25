<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table = 'cabang';

    protected $fillable = [
        'id', 
        'nama', 
        'alamat', 
        'no_telp'
    ];

    public $timestamps = true;

    public function admin()
    {
        return $this->hasMany('App\Admin', 'id_cabang');
    }
}
