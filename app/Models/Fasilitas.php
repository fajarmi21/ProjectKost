<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';
    protected $fillable = [
        'fasilitas','harga','foto'
    ];

    public function booking()
    {
        return $this->hasOne('App\Models\Booking', 'id', 'booking_id');
    }
    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }
}
