<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cabang extends Model
{
    use SoftDeletes;

    protected $table = 'cabang';

    protected $fillable = [
        'id', 
        'nama', 
        'id_alamat', 
        'no_telp'
    ];

    protected $dates = ['deleted_at'];

    public $timestamps = true;

    public function admin()
    {
        return $this->hasMany('App\Admin', 'id_cabang');
    }

    public function alamat()
    {
        return $this->belongsTo('App\Alamat', 'id_alamat');
    }
}
