<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komplain extends Model
{
    use HasFactory;
    protected $table = 'komplain';

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function kost()
    {
        return $this->hasOne('App\Models\Kost', 'id', 'id_kost');
    }
}
