<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siparis extends Model
{
    use HasFactory;

    protected $table = 'siparis';

    public function getUrun()
    {
        return $this->belongsTo(Urun::class, 'urun_id');
    }
}
