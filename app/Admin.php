<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';

    protected $fillable = [
        'id', 
        'nama', 
        'jk', 
        'no_telp', 
        'foto', 
        'id_cabang', 
        'id_user'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function cabang()
    {
        return $this->belongsTo('App\Cabang', 'id_cabang');
    }

    public function order()
    {
        return $this->hasMany('App\Order', 'id_admin');
    }
}
