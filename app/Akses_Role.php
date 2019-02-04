<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akses_Role extends Model
{
    protected $table = 'role_akses';

    protected $fillable = [
        'id',
        'status',
        'id_role',
        'id_detail'
    ];

    public $timestamps = false;

    public function detail()
    {
        return $this->belongsTo('App\Akses_Detail', 'id_detail');
    }
    
    public function role()
    {
        return $this->belongsTo('App\Role', 'id_role');
    }
}
