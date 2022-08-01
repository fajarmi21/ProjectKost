<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = ['user_id','kost_id','fas_id','nama_penyewa','tgl_booking','tgl_masuk','tgl_bayar','bukti','status_bayar','bulan'];



    public function booking()
    {
        return $this->hasOne('App\Models\Booking', 'id', 'booking_id');
    }
    
    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }
}
