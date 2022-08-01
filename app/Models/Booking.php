<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table='booking';

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }
}