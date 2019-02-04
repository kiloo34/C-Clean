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

    public function detail()
    {
        return $this->hasMany('App\Akses_Detail', 'id_akses');
    }

    public function aksesRole()
    {
        return $this->hasManyThrough('App\Akses_role', 'App\Akses_Detail');
    }

    // public function roles()
    // {
    //     return $this->belongsToMany('App\Role', 'role_user_table', 'user_id', 'role_id');
    // }
}
