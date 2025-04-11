<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contactos';

    protected $fillable = [
        'nombre_completo',
        'correo',
        'dni',
        'telefono',
        'mensaje',
        'estado_id',
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
