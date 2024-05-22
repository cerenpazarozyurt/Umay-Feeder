<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepet extends Model
{
    use HasFactory;

    protected $table = 'sepet'; 
    
    protected $fillable = [
        'urun_id',
        'created_by',
        'qty',
    ];

    public function getFiyat(){ 
        return $this->hasOne(Urun::class, 'id','urun_id' ); 
    }

    public function urun()
    {
        return $this->belongsTo(Urun::class, 'urun_id');
    }
}
