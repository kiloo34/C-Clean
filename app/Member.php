<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "member";

    protected $fillable = [
        'id',
        'nama', 
        'no_telp', 
        'alamat', 
        'foto',
        'id_user'
    ];

    public $timestamp = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function order()
    {
        return $this->hasMany('App\Order', 'id_memberv', 'local_key');
    }
}
