<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Role extends Model
{
    protected $table = 'role';

    protected $fillable = [
        'id', 'nama'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\User', 'id_role');
    }

    public function aksesDetail()
    {
        return $this->belongsToMany('App\Akses_Detail')->withPivot('id', 'nama', 'id_akses');
    }

    public function aksesRole()
    {
        return $this->hasMany('App\Akses_role', 'id_role')->where('id_role', Auth::user()->id)->get();
    }

    public function akses()
    {
        return $this->belongsToMany('App\Akses')->withPivot('id', 'nama');
    }
}
