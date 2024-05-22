<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    use HasFactory;

    protected $table = 'urun'; 
    
    protected $fillable = [
        'name',
        'price',
        'header_img',
        'header_photos',
    ];

    public function getPhoto(){  
        return $this->hasMany(Photos::class, 'urun_id','id' ); 
    }

    public function getKapak(){ 
        return $this->hasOne(Photos::class, 'urun_id','id' ); 
    }
}
