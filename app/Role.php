<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
