<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akses_Detail extends Model
{
    protected $table = 'detail_akses';

    protected $fillable = [
        'id',
        'nama',
        'id_akses'
    ];

    public $timestamps = false;

    public function akses()
    {
        return $this->belongsTo('App\Akses', 'id_akses');
    }

    public function aksesRole()
    {
        return $this->hasMany('App\Akses_Role', 'id_detail');
    }

    public function role()
    {
        return $this->belongsToMany('App\Role')->withPivot('id', 'nama', 'id_akses')->wherePivot('id', Auth::user()->role);
    }
}
