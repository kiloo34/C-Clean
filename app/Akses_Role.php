<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akses_Role extends Model
{
    protected $table = 'role_akses';

    protected $fillable = [
        'id',
        'id_role',
        'id_akses'
    ];

    public $timestamps = false;

    public function akses()
    {
        return $this->belongsTo('App\Akses', 'id_akses');
    }
    
    public function role()
    {
        return $this->belongsTo('App\Role', 'id_role');
    }
}
