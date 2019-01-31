<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akses extends Model
{
    protected $table = 'akses';

    protected $fillable = [
        'id',
        'nama'
    ];

    public $timestamps = false;

    public function detail_akses()
    {
        return $this->belongsToMany('App\Akses_Detail');
    }

    public function status()
    {
        return $this->hasMany('App\Status', 'id_akses');
    }

    public function role_akses()
    {
        return $this->hasMany('App\Akses_Role', 'id_role');
    }

    public function role()
    {
        return $this->belongsToMany('App\Role');
    }
}
