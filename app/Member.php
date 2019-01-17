<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "member";

    protected $fillable = [
        'nama', 'no_telp', 'alamat', 'foto', 'id_user'
    ];

    public $timestamp = false;

}
