<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenWeb extends Model
{
    use HasFactory;

    protected $table = 'imagenes_web';
    
    protected $fillable = [
        'key',
        'path'
    ];
}
