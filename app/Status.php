<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = [
        'id',
        'status',
        'id_detail',
        'id_akses'
    ];

    public $timestamps = false;

    public function akses()
    {
        return $this->belongsTo('App\Akses', 'id_akses');
    }
    
    public function detail()
    {
        return $this->belongsTo('App\Akses_Detail', 'id_detail');
    }
}
