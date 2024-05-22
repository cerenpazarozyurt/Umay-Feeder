<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urun_photo extends Model
{
    use HasFactory;

    protected $table = 'urun_photo'; 
    
    protected $fillable = [
        'urun_id',
        'photo_name',
    ];
}
