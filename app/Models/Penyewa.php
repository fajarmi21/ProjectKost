<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Penyewa extends Model
{
    use HasFactory;

    protected $table = 'penyewa';
    protected $fillable = ['user_id', 'kost_id', 'fas_id', 'nama_penyewa', 'tgl_booking', 'tgl_masuk', 'tgl_bayar', 'bukti', 'status_bayar', 'bulan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

