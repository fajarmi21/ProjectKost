<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PFasilitas extends Model
{
    use HasFactory;
    protected $table = 'p_fasilitas';
    protected $fillable = ['id', 'id_pembayaran', 'id_fasilitas'];
    
    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }
}
