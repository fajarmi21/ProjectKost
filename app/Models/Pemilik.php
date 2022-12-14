<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    use HasFactory;

    protected $table = 'pemilik';

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
