<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    protected $table = 'kost';

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
