<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satis extends Model
{
    use HasFactory;

    protected $table = 'satis'; 
    
    protected $fillable = [
        'urun_id',
        'price',
        'created_by',
    ];

    public function urun()
    {
        return $this->belongsTo(Urun::class, 'urun_id');
    }
    
}

